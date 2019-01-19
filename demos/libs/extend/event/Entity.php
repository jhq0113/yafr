<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/19
 * Time: 7:35 PM
 */
namespace extend\event;

/**
 * Class Entity
 * User Jiang Haiqiang
 */
class Entity
{
    /**事件名称
     * @var string $name
     */
    public $name;

    /**事件触发者
     * @var object $sender
     */
    public $sender;

    /**事件是否已经被处理，如果handled为true,其他handler不会再接收到通知
     * @var bool $handled
     */
    public $handled = false;

    /**数据
     * @var mixed $data
     */
    public $data;
}