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
        if($this->getRequest()->isPost()) {
            $userName = $this->getRequest()->getPost('userName','');

            if($userName == 'jhq0113') {
                return $this->forward(null,'Index','index',[
                    'userName' => $userName
                ]);
            }
            exit();
        }

        $this->getView()->display('user/form.phtml',[
            'userName' => $userName
        ]);

        \Yaf\Dispatcher::getInstance()->autoRender(false);
    }
}