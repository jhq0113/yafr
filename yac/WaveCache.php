<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/6
 * Time: 10:15 PM
 */

/**
 * Class WaveCache
 * User Jiang Haiqiang
 */
class WaveCache
{
    /**数据库值也没有取到值的状态值
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $dbEmpty= -1;

    /**wave缓存真实存储时间倍数
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $saveTimes = 3;

    /**
     * @var Cache
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $localCache;

    /**
     * @var \RedisCache
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $redisCache;

    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $lockPrefix = 'redis:lock:';

    //---------------------------------------------------------波式缓存-------------------------------------------------------
    //机制介绍：通过callback方式实现通用缓存机制
    //第一步：从yac拉取数据，如果取到数据，校验数据有没有过期，如果没有过期，直接返回数据
    //第二步：如果【第一步】没有拉取到数据，或者数据已过期，从redis拉取数据，如果redis没有拉取到数据直接从数据库拉取并更新redis和yac缓存，然后返回数据
    //第三步：如果【第二步】redis拉取到数据,且数据没有过期，将redis拉取数据更新到yac缓存，返回redis返回数据（其他服务器更新了redis）
    //第四步：如果【第二步】redis拉取到数据，且数据已过期，会获取一个redis锁，如果没有获取到锁，将历史数据返回，如果获取到锁，从callback获取数据并更新yac和redis缓存，最后释放锁

    /**数据是否过期
     * @param array $data
     * @param int   $time
     * @return bool
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2018/8/28
     * Time: 12:04
     */
    private function _waveDataIsExpire($data,$time)
    {
        return $data['logicExpireAt'] <= $time;
    }

    /**
     * @param array $data
     * @return array
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2018/8/28
     * Time: 12:09
     */
    protected function _waveReturnData($data)
    {
        //数据格式转化
        $data['data'] = ($data['data'] == $this->dbEmpty) ? [] : $data['data'];
        return $data['data'];
    }

    /**波式缓存获取数据
     * @param string   $key               缓存key
     * @param callable $callback          数据库、rpc等获取数据
     * @param int      $timeout           有效时间
     * @return array|bool|mixed
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2018/8/27
     * Time: 17:45
     */
    public function waveGet($key,callable $callback,$timeout)
    {
        $time   = time();

        //优先使用yac缓存
        $yacResult = $this->localCache->get($key);

        //本地读取到
        if(!empty($yacResult)) {
            $isExpire = $this->_waveDataIsExpire($yacResult,$time);

            //数据未过期
            if(!$isExpire) {
                return $this->_waveReturnData($yacResult);
            }
        }

        //yac没有读取到或者已经过期，都需要从redis读取
        $redisResult = $this->redisCache->get($key);

        //redis没有读取到，直接数据库读取
        if(empty($redisResult)) {
            return $this->waveSet($key,$callback,$timeout);
        }

        //redis读取到
        $redisIsExpire = $this->_waveDataIsExpire($redisResult,$time);

        //数据未过期
        if(!$redisIsExpire) {
            //其他端更新了redis缓存
            $this->localCache->set($key,$redisResult,$timeout);

            return $this->_waveReturnData($redisResult);
        }

        //数据无效，获得锁
        $redis = $this->redisCache->getRedis();
        $lockKey = $this->lockPrefix.$key;

        $lockResult = $redis->multi(\Redis::PIPELINE)
            ->incr($lockKey)
            ->expire($lockKey,3)
            ->exec();

        //没有获取到锁,把redis获取结果返回
        if($lockResult[0] > 1) {
            return $this->_waveReturnData($redisResult);
        }

        //获取到锁，刷新缓存
        $data = $this->waveSet($key,$callback,$timeout);

        //释放锁
        $redis->del($lockKey);

        return $data;
    }

    /**刷新波式缓存
     * @param string   $key
     * @param callable $callback
     * @param int      $timeout
     * @return bool
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2018/8/27
     * Time: 13:30
     */
    public function waveSet($key,callable $callback,$timeout)
    {
        //数据库读取
        $result = call_user_func($callback);

        //格式化数据
        $data = [
            'data'           => empty($result) ? $this->dbEmpty : $result,
            'logicExpireAt'  => time()+$timeout,
            'timeout'        => $timeout
        ];


        $this->localCache->set($key,$data,$timeout);

        //更新redis缓存
        $this->redisCache->set($key,$data,$this->saveTimes * $timeout);

        return $result;
    }

    /**删除波式缓存
     * @param string  $key
     * @return bool
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2018/8/27
     * Time: 13:50
     */
    public function waveDel($key)
    {
        //本地直接删除，以后从redis直接获取

        $this->localCache->delete($key);

        $result = $this->redisCache->get($key);
        if(empty($result)) {
            return true;
        }

        if(isset($result['logicExpireAt'])) {
            $result['logicExpireAt'] = 0;

            $timeout = isset($result['timeout']) ? (int)$result['timeout'] : 0;

            $this->redisCache->set($key,$result,$this->saveTimes * $timeout);
        }

        return true;
    }
}