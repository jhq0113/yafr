<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/5
 * Time: 10:40 PM
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
        exit(json_encode($params,JSON_UNESCAPED_UNICODE));
    }
}