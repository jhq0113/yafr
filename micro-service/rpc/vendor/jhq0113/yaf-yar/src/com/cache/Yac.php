<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/13
 * Time: 9:41 PM
 */

namespace yafr\com\cache;

/**
 * Class Yac
 * @package yafr\com\cache
 * User Jiang Haiqiang
 */
class Yac extends Cache
{
    /**
     * @var Yac
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    private $_cache;

    /**
     * @param string $key
     * @return string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected function _formatKey($key)
    {
        if(strlen($this->prefix.$key)>48) {
            return md5($key);
        }
        return $key;
    }

    /**
     * @return Yac
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getCache()
    {
        if(!($this->_cache instanceof \Yac)) {
            $this->_cache = new \Yac($this->prefix);
        }

        return $this->_cache;
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @param int $timeout
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function set($key,$value,$timeout=0)
    {
        $key = $this->_formatKey($key);
        return $this->getCache()->set($key,$value,$timeout);
    }

    /**
     * @param array $kvs
     * @param int $timeout
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function mset(array $kvs,$timeout=0)
    {
        $hashKeys = [];
        foreach ($kvs as $key=> $value) {
            $hashKeys[ $this->_formatKey($key) ] = $value;
        }

        return $this->getCache()->set($hashKeys,$timeout);
    }

    /**
     * @param string $key
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function get($key)
    {
        $key = $this->_formatKey($key);
        return $this->getCache()->get($key);
    }

    /**
     * @param array $keys
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function mget(array $keys)
    {
        $hashKeys = [];
        foreach ($keys as $value) {
            $hashKeys[ $this->_formatKey($value) ] = $value;
        }
        unset($keys);

        $keyValues = $this->getCache()->get(array_keys($hashKeys));

        $data = [];
        foreach ($keyValues as $hashKey => $value) {
            $data[ $hashKeys[ $hashKey ] ] = $value;
        }

        return $data;
    }

    /**
     * @param array|string $keys
     * @param int          $delay
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function delete($keys)
    {
        if(is_array($keys)) {
            $hashKeys = array_map(function($value){
                return $this->_formatKey($value);
            },$keys);
        }else {
            $hashKeys = $this->_formatKey($keys);
        }

        return $this->getCache()->delete($hashKeys);
    }

    /**
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function flush()
    {
        return $this->getCache()->flush();
    }

    /**
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function info()
    {
        return $this->getCache()->info();
    }
}