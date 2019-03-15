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
}