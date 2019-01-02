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
        if($this->_request->isPost()) {
            $userName = $this->getRequest()->getParam('userName','');

            if($userName == 'jhq0113') {
                return $this->forward('index','index',[
                    'userName' => $userName
                ]);
            }
        }

        $this->render('form',[
            'userName' => $userName
        ]);
    }
}