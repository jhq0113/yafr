<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/15
 * Time: 10:28 PM
 */

namespace extend\event;


use extend\Di;

/**
 * Class LogObserver
 * @package extend\event
 * User Jiang Haiqiang
 */
class LogObserver implements IObserver
{
    public function update(Subject $subject)
    {
        // TODO: Implement update() method.
        Di::get('log')->info($subject->state);
    }
}