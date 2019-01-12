<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/12
 * Time: 10:04 PM
 */

namespace extend;

/**
 * Interface ILoggerAware
 * @package extend
 * User: Jiang Haiqiang
 */
interface ILoggerAware
{
   /**
     * 设置一个日志记录实例
     *
     * @param ILogger $logger
     * @return null
     */
    public function setLogger(ILogger $logger);
}