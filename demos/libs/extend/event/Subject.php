<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/15
 * Time: 10:19 PM
 */

namespace extend\event;

/**
 * Class Subject
 * @package extend\event
 * User Jiang Haiqiang
 */
class Subject
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $state;

    /**
     * @var array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    private $_observers = [];

    /**
     * @param $observer
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function attach(IObserver $observer)
    {
        array_push($this->_observers,$observer);
    }

    /**
     * @param IObserver $observer
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function dettach(IObserver $observer)
    {
        foreach ($this->_observers as $key => $item) {
            if($item === $observer) {
                unset($this->_observers[ $key ]);
                break;
            }
        }
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function notify()
    {
        foreach ($this->_observers as $observer) {
            $observer->update($this);
        }
    }
}