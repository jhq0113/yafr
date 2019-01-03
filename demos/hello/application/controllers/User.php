<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/2
 * Time: 9:57 PM
 */

class UserController extends \Yaf\Controller_Abstract
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function loginAction()
    {
        echo $this->_module.'<br/>';
        echo $this->_name.'<br/>';

        /*$body = $this->render('form',[
            'userName' => time()
        ]);*/

        //$this->_response->setBody($body);
        //$this->_response->prependBody('header'.'<br/>');
        //$this->_response->appendBody('footer'.'<br/>');


        //$this->_response->response();
        //\Yaf\Dispatcher::getInstance()->autoRender(false);

        //return;

        if($this->_request->isPost()) {
            $userName = $this->getRequest()->getPost('userName','');

            if($userName == 'jhq0113') {
                \Yaf\Dispatcher::getInstance()->autoRender(false);
                $this->forward('for',[
                    'userName' => $userName
                ]);
            }

        }

        $this->getView()->display('user/form.phtml',[
            'userName' => $userName
        ]);


    }

    public function forAction()
    {
        echo 'for';
    }
}