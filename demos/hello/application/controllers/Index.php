<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/30
 * Time: 5:35 PM
 */
class IndexController extends Yaf\Controller_Abstract
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function init()
    {
        \extend\Di::get('log')->debug('init start');

        echo $this->getRequest()->controller.'<br/>';
        echo $this->getRequest()->action.'<br/>';
        if($this->getRequest()->action != 'index') {
            exit('禁止访问');
        }

        \extend\Di::get('log')->debug('init end!');
    }

    // default action name
    public function indexAction()
    {
        \extend\Di::get('log')->info('index action start run');
        //$service = new \service\BaseService('dbName');

        //$adapter = new \adapter\BaseAdapter('testAdapter');

        //$this->getView()->content = $adapter->name;

        /**
         * @var \extend\log\File $log
         */
        $log = \extend\Di::get('log');
        $log->info('wo shi info {level} ',[
            'level' => 'info'
        ]);

        $config = \Yaf\Application::app()->getConfig()->toArray();

        echo json_encode($config);

        \extend\Di::get('log')->info('index action run end');
        die;
    }
}