<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/30
 * Time: 5:35 PM
 */
class IndexController extends \extend\ControllerLayout
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function init()
    {
        //echo $this->getRequest()->controller.'<br/>';
        //echo $this->getRequest()->action.'<br/>';
        if($this->getRequest()->action != 'index') {
            exit('禁止访问');
        }

    }

    // default action name
    public function indexAction()
    {
        //$service = new \service\BaseService('dbName');

        //$adapter = new \adapter\BaseAdapter('testAdapter');

        $this->_view->assign(['content' => 'Hello World']);
        /*$result = $this->render('index',[
            'content' => 'Hello World'
        ]);

        echo $result;
        die;*/
    }
}