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