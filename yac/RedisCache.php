<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/6
 * Time: 10:32 PM
 */

/**
 * Class RedisCache
 * User Jiang Haiqiang
 */
class RedisCache
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $host = '127.0.0.1';

    /**
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $port = 6379;

    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $auth = '';

    /**
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $db = 0;

    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $prefix = 'redis:';

    /**
     * @var \Redis
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    private $_redis;

    /**
     * @return bool|Redis
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getRedis()
    {
        if(!($this->_redis instanceof \Redis)) {
            $this->_redis = new \Redis();
            $connectResult = $this->_redis->connect($this->host,$this->port);
            if(!$connectResult) {
                $this->_redis = null;
                return false;
            }

            if(!empty($this->auth)) {
                $authResult = $this->_redis->auth($this->auth);
                if(!$authResult) {
                    $this->_redis = null;
                    return false;
                }
            }

            $this->_redis->select($this->db);

            $this->_redis->setOption(\Redis::OPT_PREFIX,$this->prefix);
        }

        return $this->_redis;
    }

    /**
     * @param string $key
     * @return array|mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function get($key)
    {
        $values = $this->getRedis()->get($key);
        if(empty($values)) {
            return false;
        }

        $values = json_decode($values,true);
        return $values['data'];
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @param int    $timeout
     * @return bool
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function set($key,$value,$timeout = null)
    {
        $data = json_encode([
            'data' => $value
        ]);

        return $this->getRedis()->set($key,$data,$timeout);
    }
}