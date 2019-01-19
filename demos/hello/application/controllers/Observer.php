<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/19
 * Time: 5:27 PM
 */

/**
 * Class ObserverController
 * User Jiang Haiqiang
 */
class ObserverController extends \Yaf\Controller_Abstract
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function init()
    {
        \Yaf\Dispatcher::getInstance()->disableView();
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function indexAction()
    {
        /**
         * @var \observer\Phone $notifier
         */
        $notifier = \extend\Di::get('notifier');
        $notifier->state = '就绪';

        $notifier->notify();
    }
}