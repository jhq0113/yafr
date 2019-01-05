<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/5
 * Time: 8:09 PM
 */

/**
 * Class ErrorController
 * User Jiang Haiqiang
 */
class ErrorController extends \Yaf\Controller_Abstract
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function init()
    {
         \Yaf\Dispatcher::getInstance()->disableView();
    }

    /**
     * @param $exception
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function errorAction($exception)
    {

        /**
         * @var \Exception $exception
         */

        var_dump($exception->getMessage());
    }
}