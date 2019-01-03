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

        //获取当期请求action
        //var_dump($this->_request->action);

        //获取$_SERVER中的信息
        //$ip = $this->_request->getServer('REMOTE_ADDR','');

        //var_dump($ip);

        //获取$_GET中的值
        //$userId = $this->_request->getQuery('id','0');
        //var_dump($userId);

        //获取$_POST中的值
        //$userId = $this->_request->getPost('id','0');
        //var_dump($userId);

        $this->_response->setBody('Hello World!');
        $this->_response->response();

        die;
    }
}