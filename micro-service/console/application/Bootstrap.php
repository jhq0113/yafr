<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/19
 * Time: 9:34 PM
 */
use yafr\com\Di;

/**
 * Class Bootstrap
 * User Jiang Haiqiang
 */
class Bootstrap extends \Yaf\Bootstrap_Abstract
{
    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initDb(\Yaf\Dispatcher $dispatcher)
    {
        $dbConfig = $dispatcher->getApplication()->getConfig()->get('db');
        $db = new \Medoo\Medoo($dbConfig->toArray());
        Di::set('db',$db);
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initLog(\Yaf\Dispatcher $dispatcher)
    {
        $logConfig = $dispatcher->getApplication()->getConfig()->toArray()['log'];
        $logConfig['fileName'] = $logConfig['logPath'].'/'.date('Y-m').'/'.date('d').'/console.log';
        Di::set('log',$logConfig);
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initConsole(\Yaf\Dispatcher $dispatcher)
    {
        $dispatcher->autoRender(false);
        $dispatcher->disableView();

        $controller = isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : 'index';
        $action     = isset($_SERVER['argv'][2]) ? $_SERVER['argv'][2] : 'index';

        $request = new \Yaf\Request\Simple('cli','Index',$controller,$action,array_slice($_SERVER['argv'],3));
        $dispatcher->dispatch($request);
    }
}