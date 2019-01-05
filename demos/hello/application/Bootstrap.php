<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 8:44 PM
 */

class Bootstrap extends \Yaf\Bootstrap_Abstract
{
    public function _initRoute(\Yaf\Dispatcher $dispacher)
    {
        $router = $dispacher->getRouter();

        //$route = new \Yaf\Route\Simple('m','c','a');
        //$route = new \Yaf\Route\Supervar('r');
        $route = new \Yaf\Route\Regex(
            '#regex/(\d+)/(\d+)#',
                [
                    'module'      => 'rest',
                    'controller'  => 'rest',
                    'action'      => 'route',
                ],
                [
                    1 => 'param1',
                    2 => 'param2',
                ]
            );

        $router->addRoute('simple',$route);
    }
}