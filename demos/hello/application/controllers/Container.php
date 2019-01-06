<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/6
 * Time: 12:43 PM
 */

/**
 * Class ContainerController
 * User Jiang Haiqiang
 */
class ContainerController extends \Yaf\Controller_Abstract
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function indexAction()
    {
        if(\Yaf\Registry::has('config')) {
            $config = \Yaf\Registry::get('config');
            \Yaf\Registry::del('config');
            if(!\Yaf\Registry::has('config')) {
                exit(json_encode($config->toArray(),JSON_UNESCAPED_UNICODE));
            }
        }

    }


    public function diAction()
    {
        $user = new \service\User();
        $info = $user->getInfo();

        exit(json_encode($info));
    }
}