<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/19
 * Time: 5:16 PM
 */

namespace observer;

/**
 * Interface INotifier
 * @package observer
 * User: Jiang Haiqiang
 */
interface INotifier
{
    /**
     * @param IObserver $observer
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function attach(IObserver $observer);

    /**
     * @param IObserver $observer
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function dettach(IObserver $observer);

    /**
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function notify();
}