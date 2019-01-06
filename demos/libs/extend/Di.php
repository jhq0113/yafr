<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/6
 * Time: 2:32 PM
 */

namespace extend;

use Yaf\Registry;

/**
 * Class Di
 * @package extend
 * User Jiang Haiqiang
 */
class Di
{
    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**块赋值
     * @param $object
     * @param array $properties
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function block($object,$properties=[])
    {
        foreach ($properties as $property => $value) {
            $object->$property = $value;
        }
    }

    /**根据对象配置创建对象
     * @param array  $config   对象配置
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function createObject($config)
    {
        $class = $config['class'];
        unset($config['class']);

        $object = new $class();

        self::block($object,$config);

        if(method_exists($object,'init')) {
            $object->init();
        }

        return $object;
    }

    /**
     * @param string $name
     * @param mixed  $config
     * @return bool
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function set($name,$config)
    {
        return Registry::set($name,$config);
    }

    /**
     * @param $name
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function get($name)
    {
        $object = Registry::get($name);
        if(is_array($object) && isset($object['class'])) {
            $instance = self::createObject($object);
            Registry::set($name,$instance);

            return $instance;
        }

        return $object;
    }

    /**
     * @param mixed        $config
     * @param null|string  $defaultClass
     * @return array|mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function insure($config,$defaultClass=null)
    {
        if(is_array($config)) {
            if(isset($config['class'])) {
                return self::createObject($config);
            }

            if(isset($defaultClass)) {
                $config['class'] = $defaultClass;

                return self::createObject($config);
            }
        }

        return $config;
    }
}