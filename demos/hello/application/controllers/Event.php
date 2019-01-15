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
        \extend\Di::get('event')->notify();
    }
}