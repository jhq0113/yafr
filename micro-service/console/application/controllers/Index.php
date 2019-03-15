<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/19
 * Time: 9:33 PM
 */

use yafr\com\Di;

/**
 * Class IndexController
 * User Jiang Haiqiang
 */
class IndexController extends \yafr\yaf\Console
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function init()
    {
        $this->storage = new CronModel();

        /**
         * @var \yafr\com\log\ILog $log
         */
        $log = Di::get('log');

        $log->info($this->getRequest()->action);
    }
}