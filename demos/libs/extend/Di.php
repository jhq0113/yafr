<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/6
 * Time: 1:47 PM
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
     * @param array  $properties
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function block($object,$properties)
    {
        foreach ($properties as $property =>$value) {
            $object->$property = $value;
        }
    }

    /**根据对象配置创建对象
     * @param array $config
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function createObject(array $config)
    {
        $class = $config['class'];
        unset($config['class']);

        $object = new $class();

        if(!empty($config)) {
            self::block($object,$config);
        }

        if(method_exists($object,'init')) {
            $object->init();
        }

        return $object;
    }

    /**放入容器
     * @param $name
     * @param $config
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function set($name,$config)
    {
        Registry::set($name,$config);
    }

    /**获取对象
     * @param $name
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function get($name)
    {
        $object = Registry::get($name);
        if(is_array($object) && isset($object['class'])) {
            echo '对象创建了<br/>';
            $instance = self::createObject($object);
            Registry::set($name,$instance);
            return $instance;
        }

        echo '从容器中获取到的对象<br/>';

        return $object;
    }

    /**
     * @param $config
     * @param null $defaultClass
     * @return array|mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function insure($config,$defaultClass=null)
    {
        if(isset($config['class'])) {
            return self::createObject($config);
        }

        if(isset($defaultClass) && is_array($config)) {
            $config['class'] = $defaultClass;
            return self::createObject($config);
        }

        return $config;
    }
}