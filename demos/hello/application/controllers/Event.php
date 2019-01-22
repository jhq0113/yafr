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

    /**
     * @param \extend\event\Entity $entity
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function addition(\extend\event\Entity $entity)
    {
        echo $entity->data;
    }

    public function indexAction()
    {
        /**
         * @var \extend\App $app
         */
        $app = \extend\Di::get('app');

        $app->on('action:run',[$this,'addition']);

        //移除所有事件的handler
        //$app->off('action:run');
        if($app->hasHandlers('action:run')) {
            $app->off('action:run',[$this,'addition']);
        }



        $entity = new \extend\event\Entity();
        $entity->data = time();

        $app->trigger('action:run',$entity);
    }
}