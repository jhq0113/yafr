<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/30
 * Time: 5:35 PM
 */

class IndexController extends Yaf_Controller_Abstract
{
    // default action name
    public function indexAction()
    {
        //$this->getView()->content = "Hello World";

        $object = new \com\BaseObject("Hello World");

        $this->getView()->content = $object->name;
    }
}