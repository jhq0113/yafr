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
        /*$this->_response->setBody('Hello World!');

        $this->_response->prependBody('Yaf<br/>');

        $this->_response->appendBody('Thanks');

        $this->_response->response();*/

        //forward跳转
        /* <b>Notice, there are 3 available method signatures:</b>
	 * <p>\Yaf\Controller_Abstract::forward ( string $module , string $controller , string $action [, array $parameters ] )</p>
	 * <p>\Yaf\Controller_Abstract::forward ( string $controller , string $action [, array $parameters ] )</p>
	 * <p>\Yaf\Controller_Abstract::forward ( string $action [, array $parameters ] )</p>*/

        //$this->forward('for');
        //$this->forward('Index','index');

        //redirect
        //$this->redirect('/');

        //render
        /*$result = $this->render('info',[
            'userName' => time(),
            'content'  => uniqid('content')
        ]);

        echo $result;*/

        //display
        /*$this->display('info',[
            'userName' => time(),
            'content'  => uniqid('content')
        ]);*/

        $this->_view->assign([
            'userName' => time(),
            'content'  => uniqid('content')
        ]);

        //\Yaf\Dispatcher::getInstance()->autoRender(false);
    }

    public function forAction()
    {
        exit('forward');
    }
}