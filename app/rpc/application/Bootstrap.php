<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/2
 * Time: 11:19 AM
 */

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
        \yafr\com\Di::set('db',$db);
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initLog(\Yaf\Dispatcher $dispatcher)
    {
        $logConfig = $dispatcher->getApplication()->getConfig()->toArray()['log'];
        $logConfig['fileName'] = $logConfig['logPath'].'/'.date('Y-m').'/'.date('d').'/rpc.log';
        \yafr\com\Di::set('log',$logConfig);
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initRpc(\Yaf\Dispatcher $dispatcher)
    {
        $handler = ltrim($_SERVER['REQUEST_URI'],'/');
        $class = 'service\\'.ucfirst($handler);
        if(!class_exists($class)) {
            exit(json_encode([
                'status' => '404',
                'msg'    => 'not found',
                'data'   => []
            ]));
        }

        $server = new Yar_Server(new $class([
            'dispatcher' => $dispatcher
        ]));
        $server->handle();
    }
}