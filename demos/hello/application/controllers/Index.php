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
        $object = new models\BaseModel();
        $object->name = 'sdfasfd';
        echo $object->name;die;

        $this->getView()->content = "Hello World";
    }
}