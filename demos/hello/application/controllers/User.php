<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/2
 * Time: 9:57 PM
 */

class UserController extends \Yaf\Controller_Abstract
{
    public function loginAction()
    {
        $params = $this->getRequest()->getParams();
        var_dump($params);
    }
}