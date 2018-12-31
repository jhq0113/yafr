<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 12:10 PM
 */

namespace com;

/**
 * Class BaseObject
 * @package com
 * User Jiang Haiqiang
 */
class BaseObject
{
    /**
     * @var
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $name;

    /**
     * BaseObject constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}