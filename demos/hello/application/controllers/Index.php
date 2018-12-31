<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/30
 * Time: 5:35 PM
 */

class IndexController extends Yaf\Controller_Abstract
{
    // default action name
    public function indexAction()
    {
        //$this->getView()->content = "Hello World";
        $cons = get_defined_constants();
        var_dump($cons);die;

        $config = \Yaf\Application::app()->getConfig();

        var_dump($config);die;

        $object = new \com\BaseObject("Hello World!");

        $this->getView()->content = $object->name;
    }
}