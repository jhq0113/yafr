<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/19
 * Time: 7:46 PM
 */

class EventController extends \Yaf\Controller_Abstract
{
    public function init()
    {
        \Yaf\Dispatcher::getInstance()->disableView();
    }

    public function indexAction()
    {
        /**
         * @var \extend\App $app
         */
        $app = \extend\Di::get('app');
        $app->trigger('action:run');
    }
}