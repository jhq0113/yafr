<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/5
 * Time: 8:34 PM
 */

/**
 * Class RouteController
 * User Jiang Haiqiang
 */
class RouteController extends \Yaf\Controller_Abstract
{
    public function indexAction()
    {
        $query = json_encode($this->_request->getParams(),JSON_UNESCAPED_UNICODE);
        exit($query);
    }
}