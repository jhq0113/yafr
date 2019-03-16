<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 8:44 PM
 */

use yafr\com\Di;

class Bootstrap extends \Yaf\Bootstrap_Abstract
{
    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initRest(\Yaf\Dispatcher $dispatcher)
    {
        $dispatcher->autoRender(false);
        $dispatcher->disableView();
    }

    /**初始化日志组件
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initLog(\Yaf\Dispatcher $dispatcher)
    {
        $logConfig = \Yaf\Application::app()->getConfig()->toArray()['log'];
        $logConfig['fileName'] = $logConfig['logPath'].'/'.date('Y-m').'/'.date('d').'/rest.log';
        unset($logConfig['logPath']);
        Di::set('log',$logConfig);
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initRedis(\Yaf\Dispatcher $dispatcher)
    {
        $redisConfig = \Yaf\Application::app()->getConfig()->toArray()['redis'];
        $redisConfig['class']  = \yafr\com\cache\Redis::class;
        Di::set('redis',$redisConfig);
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initService(\Yaf\Dispatcher $dispatcher)
    {
        Di::set('service',[
            'class'  => 'sdk\Service',
            'redis'  => Di::get('redis')
        ]);
    }
}