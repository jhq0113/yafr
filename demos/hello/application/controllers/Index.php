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
        try {
            $object = new services\BaseServices();
            $object->name = 'sdfasfd';
            echo $object->name;die;
        }catch (\Exception $exception) {
            var_dump($exception->getMessage());
            die;
        }


        $this->getView()->content = "Hello World";
    }
}