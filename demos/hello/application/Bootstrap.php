<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 8:44 PM
 */

class Bootstrap extends \Yaf\Bootstrap_Abstract
{
    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initComponents(\Yaf\Dispatcher $dispatcher)
    {
        $config = \Yaf\Application::app()->getConfig();
        //\Yaf\Registry::set('config',$config);
        \extend\Di::set('dbUser',$config->toArray()['db']);

    }

    /**初始化日志组件
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initLog(\Yaf\Dispatcher $dispatcher)
    {
        $logConfig = \Yaf\Application::app()->getConfig()->toArray()['log'];
        $logConfig['fileName'] = $logConfig['logPath'].'/'.date('Y-m').'/'.date('d').'/yaf.log';
        unset($logConfig['logPath']);
        \extend\Di::set('log',$logConfig);

        \extend\Di::get('log')->debug('log set done!');
    }

    public function _initEvent(\Yaf\Dispatcher $dispatcher)
    {
        $subject = new \extend\event\Subject();

        $observer1 = new \extend\event\LogObserver();
        $observer1->name = 'observer1';
        $observer2 = new \extend\event\LogObserver();
        $observer2->name = 'observer2';
        $observer3 = new \extend\event\LogObserver();
        $observer3->name = 'observer3';
        $subject->attach($observer1);
        $subject->attach($observer2);
        $subject->attach($observer3);
        $subject->dettach($observer2);

        \extend\Di::set('event',$subject);
    }

    /**
     * @param \Yaf\Dispatcher $dispacher
     * @throws \Yaf\Exception\TypeError
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initRoute(\Yaf\Dispatcher $dispacher)
    {
        $router = $dispacher->getRouter();
        //$route = new \Yaf\Route\Simple('m','c','a');
        //$route = new \Yaf\Route\Supervar('r');

        /*$route = new \Yaf\Route\Regex(
                '#regex/(\d+)/(\d+)#',
                [
                    'module'      => 'rest',
                    'controller'  => 'route',
                    'action'      => 'index',
                ],
                [
                    1 => 'param1',
                    2 => 'param2',
                ]
        );*/

        /*$route = new \Yaf\Route\Rewrite(
            'rewrite/:param1/:param2',
            [
                'module'      => 'rest',
                'controller'  => 'route',
                'action'      => 'index',
            ]
        );

        $router->addRoute('rewrite',$route);*/

        $router->addConfig(\Yaf\Application::app()->getConfig()->routes);
    }


}