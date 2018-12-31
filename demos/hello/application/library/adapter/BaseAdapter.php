<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 1:59 PM
 */

namespace adapter;

/**
 * Class BaseAdapter
 * @package adapter
 * User Jiang Haiqiang
 */
class BaseAdapter
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $name;

    /**
     * BaseAdapter constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}