<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/15
 * Time: 10:32 PM
 */

class EventController extends \Yaf\Controller_Abstract
{
    public function indexAction()
    {
        /**
         * @var \extend\event\Subject $event
         */
        $event = \extend\Di::get('event');
        $event->state ='trigger';
        $event->notify();
    }
}