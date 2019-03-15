<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/21
 * Time: 7:19 AM
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