<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/19
 * Time: 5:18 PM
 */

namespace observer;

/**
 * Interface IObserver
 * @package observer
 * User: Jiang Haiqiang
 */
interface IObserver
{
    /**
     * @param INotifier $notifier
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function update(INotifier $notifier);
}