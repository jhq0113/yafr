<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/3
 * Time: 9:49 PM
 */

/**
 * Class User
 * User Jiang Haiqiang
 */
class UserController extends \Yaf\Controller_Abstract
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function infoAction()
    {
        //模块和控制器名称
        //var_dump($this->_module,$this->_name);

        //获取请求方式
        //$isGet = $this->_request->isGet();
        //var_dump($isGet);

        var_dump($this->_request->action);
        die;
    }
}