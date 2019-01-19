<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/19
 * Time: 5:17 PM
 */

namespace observer;

/**
 * Class Phone
 * @package observer
 * User Jiang Haiqiang
 */
class Phone implements INotifier
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $state = '处理中';

    /**
     * @var array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    private $_pool = [];

    /**
     * @param IObserver $observer
     * @return mixed|void
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function attach(IObserver $observer)
    {
        // TODO: Implement attach() method.
        array_push($this->_pool,$observer);
    }

    /**
     * @param IObserver $observer
     * @return mixed|void
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function dettach(IObserver $observer)
    {
        // TODO: Implement dettach() method.
        foreach ($this->_pool as $index => $item) {
            if($observer === $item) {
                unset($this->_pool[ $index ]);
            }
        }
    }

    /**
     * @return mixed|void
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function notify()
    {
        // TODO: Implement notify() method.
        foreach ($this->_pool as $observer) {
            $observer->update($this);
        }
    }
}