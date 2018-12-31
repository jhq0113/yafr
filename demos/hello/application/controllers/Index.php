<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/30
 * Time: 5:35 PM
 */
class IndexController extends Yaf\Controller_Abstract
{
    public function init()
    {
        echo $this->getRequest()->controller;
        echo $this->getRequest()->action;
    }

    // default action name
    public function indexAction()
    {
        //$service = new \service\BaseService('dbName');

        //$adapter = new \adapter\BaseAdapter('testAdapter');

        //$this->getView()->content = $adapter->name;

        $config = \Yaf\Application::app()->getConfig()->toArray();
        echo json_encode($config);
        die;
    }
}