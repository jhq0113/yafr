<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/15
 * Time: 10:21 PM
 */

namespace extend\event;

/**
 * Interface IObserver
 * @package extend\event
 * User: Jiang Haiqiang
 */
interface IObserver
{
    /**
     * @param Subject $subject
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function update(Subject $subject);
}