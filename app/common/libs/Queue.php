<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/8
 * Time: 10:52 PM
 */

namespace common\libs;

/**
 * Class Queue
 * @package common\libs
 * User Jiang Haiqiang
 */
class Queue
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $host;

    /**
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $port;

    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $auth;

    /**
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $db;

    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $prefix = 'redis:queue:';

    /**
     * @var \Redis
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected $_redis;

    /**
     * @return bool|\Redis
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getRedis()
    {
        if(!($this->_redis instanceof \Redis)) {
            $this->_redis = new \Redis();
            $connectStatus = $this->_redis->connect($this->host,$this->port);
            if(!$connectStatus) {
                $this->_redis = null;
                return false;
            }

            if(!empty($this->auth)) {
                $authStatus = $this->_redis->auth($this->auth);
                if(!$authStatus) {
                    $this->_redis = null;
                    return false;
                }
            }

            $this->_redis->setOption(\Redis::OPT_PREFIX,$this->prefix);

            $this->_redis->select($this->db);
        }

        return $this->_redis;
    }

    /**入队
     * @param string $channel
     * @param mixed  $item
     * @return bool|int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function push($channel,$item)
    {
        return $this->getRedis()->lPush($channel,json_encode(['item' => $item ]));
    }

    /**出队
     * @param string $channel
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function pop($channel)
    {
        $data = $this->getRedis()->rPop($channel);
        if(!empty($data)) {
            return json_decode($data,true)['item'];
        }

        return false;
    }
}