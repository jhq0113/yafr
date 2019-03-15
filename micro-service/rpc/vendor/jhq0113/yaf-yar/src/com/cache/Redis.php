<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/13
 * Time: 9:42 PM
 */

namespace yafr\com\cache;

/**
 * Class Redis
 * @package yafr\com\cache
 * User Jiang Haiqiang
 */
class Redis extends Cache
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
        return $this->_decrypt($values);
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
        return $this->getRedis()->set($key,$this->_encrypt($value),$timeout);
    }

    /**
     * @param array $keys
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function mget(array $keys)
    {
        $keyValues = $this->getRedis()->mget($keys);

        return array_map(function($value){
            return $this->_decrypt($value);
        },$keyValues);
    }

    /**
     * @param array $kvs
     * @param null $timeout
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function mset(array $kvs,$timeout=null)
    {
        $kvs = array_map(function($value){
            return $this->_encrypt($value);
        },$kvs);

        return $this->getRedis()->mset($kvs,$timeout);
    }

    /**
     * @param string $key
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function delete($key)
    {
        // TODO: Implement delete() method.
        return $this->getRedis()->delete($key);
    }
}