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
        $params['params'] = $this->_request->getParams();
        $params['query']  = $this->_request->getQuery();
        //$this->_request->getParam()
        exit(json_encode($params,JSON_UNESCAPED_UNICODE));
    }
}