<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/13
 * Time: 1:32 PM
 */
namespace yafr\com\formatter;

/**
 * Class IFormatter
 * @package yafr\com
 * User Jiang Haiqiang
 */
abstract class IFormatter
{
    /**
     * @param $data
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    abstract function convert(array $data = []);
}