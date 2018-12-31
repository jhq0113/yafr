<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 2:46 PM
 */

/**
 * Class Bootstrap
 * User Jiang Haiqiang
 */
class Bootstrap extends \Yaf\Bootstrap_Abstract
{
    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initConfig(\Yaf\Dispatcher $dispatcher)
    {
        echo __FUNCTION__.PHP_EOL;
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initDb(\Yaf\Dispatcher $dispatcher)
    {
        echo __FUNCTION__.PHP_EOL;
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initComponents(\Yaf\Dispatcher $dispatcher)
    {
        echo __FUNCTION__.PHP_EOL;
    }
}