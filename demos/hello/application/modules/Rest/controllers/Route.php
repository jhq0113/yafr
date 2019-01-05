<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/5
 * Time: 10:52 PM
 */

/**
 * Class RouteController
 * User Jiang Haiqiang
 */
class RouteController extends \Yaf\Controller_Abstract
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function indexAction()
    {
        $params = $this->_request->getParams();

        //$this->_request->getParam()
        exit(json_encode($params,JSON_UNESCAPED_UNICODE));
    }
}