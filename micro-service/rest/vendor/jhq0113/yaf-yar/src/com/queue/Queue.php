<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/13
 * Time: 9:30 PM
 */

namespace yafr\com\queue;

/**
 * Class Queue
 * @package yafr\com\queue
 * User Jiang Haiqiang
 */
abstract class Queue
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

    /**入队
     * @param string $channel
     * @param mixed  $item
     * @return bool|int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    abstract public function push($channel,$item);

    /**出队
     * @param string $channel
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    abstract public function pop($channel);
}