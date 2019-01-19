<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/19
 * Time: 6:26 PM
 */

namespace extend;

/**
 * Class Event
 * @package ucf\libs\base
 * Author: Jiang Haiqiang
 * Email : jhq0113@163.com
 * Date: 2018/6/29
 * Time: 11:10
 */
class Event
{
    /**
     * @var string $name
     */
    public $name;

    /**
     * @var static $sender
     */
    public $sender;

    /**
     * @var bool $handled
     */
    public $handled = false;

    /**
     * @var mixed $data
     */
    public $data;
}