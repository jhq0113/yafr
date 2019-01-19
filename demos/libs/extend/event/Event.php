<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/19
 * Time: 7:36 PM
 */

namespace extend\event;

/**
 * Trait Event
 * @package extend\event
 * User: Jiang Haiqiang
 */
trait Event
{
    /**
     * @var array $_events
     */
    protected $_events = [];

    /**
     * 绑定事件
     * @param string     		$name
     * @param \Closure | array  $handler
     * @param bool 				$append
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2018/6/27
     * Time: 11:01
     */
    public function on($name, $handler, $append = true)
    {
        $this->_events[ $name ] = isset($this->_events[ $name ]) ? $this->_events[ $name ] : [];

        $append ? array_push($this->_events[ $name ],$handler) : array_unshift($this->_events[ $name ],$handler);
    }

    /**
     * 解绑事件
     * @param string     $name
     * @param null       $handler
     * @return bool
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2018/6/27
     * Time: 11:01
     */
    public function off($name, $handler = null)
    {
        if (!isset($this->_events[ $name ])) {
            return false;
        }

        //移除所有$name事件的handler
        if ($handler === null) {
            unset($this->_events[ $name ]);
            return true;
        } else {
            $removed = false;
            foreach ($this->_events[ $name ] as $index => $eventHandler) {
                if ($eventHandler === $handler) {
                    unset($this->_events[ $name ][ $index ]);
                    $removed = true;
                }
            }

            if ($removed) {
                $this->_events[ $name ] = array_values($this->_events[ $name ]);
            }

            return $removed;
        }
    }

    /**
     * 是否有handler
     * @param string $name
     * @return bool
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2018/6/27
     * Time: 11:01
     */
    public function hasHandlers($name)
    {
        if (isset($this->_events[ $name ]) && !empty($this->_events[ $name ])) {
            return true;
        }

        return false;
    }

    /**
     * 触发事件
     * @param string  $name
     * @param null    $event
     * Author: Jiang Haiqiang
     * Email : jhq0113@163.com
     * Date: 2018/6/27
     * Time: 11:01
     */
    public function trigger($name, $event = null)
    {
        if (empty($this->_events[ $name ])) {
            return;
        }

        if ($event === null) {
            $event = new Entity();
        }

        $event->handled = false;
        $event->name = $name;


        foreach ($this->_events[ $name ] as $handler) {
            call_user_func($handler, $event);

            //标记已处理，停止后续处理
            if ($event->handled) {
                return;
            }
        }

    }
}