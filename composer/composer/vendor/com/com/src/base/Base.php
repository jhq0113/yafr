<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/3
 * Time: 7:37 PM
 */

namespace com\base;

/**
 * Class Base
 * @package com\base
 * User Jiang Haiqiang
 */
class Base
{
    /**
     * Base constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        foreach ($config as $property => $value) {
            $this->$property = $value;
        }
    }

    /**
     * @param $name
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
    }

    /**]
     * @param $name
     * @param $value
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }
}