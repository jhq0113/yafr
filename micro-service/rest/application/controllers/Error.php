<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/15
 * Time: 10:22 PM
 */

/**
 * Class ErrorController
 * User Jiang Haiqiang
 */
class ErrorController extends \Yaf\Controller_Abstract
{
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