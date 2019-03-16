<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/16
 * Time: 10:45 PM
 */
namespace sdk;

/**
 * Class Service
 * User Jiang Haiqiang
 */
class Service
{
    /**
     * @var \yafr\com\cache\Redis
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $redis;

    /**
     * @param $serviceName
     * @return mixed|string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function find($serviceName)
    {
        $service = $this->redis->getRedis()->sRandMember($serviceName,1);
        if(!empty($service)) {
            return json_decode($service[0],true);
        }

        return '';
    }

    /**
     * @param $serviceName
     * @param $config
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function register($serviceName,$config)
    {
        return $this->redis->getRedis()->sAdd($serviceName,json_encode($config));
    }
}