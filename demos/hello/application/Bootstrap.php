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

        $router->addRoute('simple',new \Yaf\Route\Simple('m','c','a'));
    }
}