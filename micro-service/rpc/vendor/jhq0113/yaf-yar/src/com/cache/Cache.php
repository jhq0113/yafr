<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/13
 * Time: 9:35 PM
 */

namespace yafr\com\cache;

/**
 * Class Cache
 * @package yafr\com\cache
 * User Jiang Haiqiang
 */
abstract class Cache
{
    /**
     * @param mixed $data
     * @return string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected function _encrypt($data)
    {
        return json_encode(['data' => $data ]);
    }

    /**
     * @param string $data
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected function _decrypt($data)
    {
        if(empty($data)) {
            return false;
        }

        return json_decode($data,true)['data'];
    }

    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $prefix = 'cache:';

    /**
     * @param string $key
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    abstract public function get($key);

    /**
     * @param $key
     * @param $value
     * @param int $expire
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    abstract public function set($key,$value,$timeout=0);

    /**
     * @param array $keys
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    abstract public function mget(array  $keys);

    /**
     * @param $kvs
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    abstract public function mset(array $kvs,$timeout=0);

    /**
     * @param string $key
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    abstract public function delete($key);
}