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
class Bootstrap
{
    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function __initConfig(\Yaf\Dispatcher $dispatcher)
    {
        echo __FUNCTION__.PHP_EOL;
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function __initDb(\Yaf\Dispatcher $dispatcher)
    {
        echo __FUNCTION__.PHP_EOL;
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function __initComponents(\Yaf\Dispatcher $dispatcher)
    {
        echo __FUNCTION__.PHP_EOL;
    }
}