<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/13
 * Time: 1:36 PM
 */

namespace extend\helpers;


/**
 * Class HttpHelper
 * @package extend\helpers
 * User Jiang Haiqiang
 */
class HttpHelper extends BaseHelper
{
    /**
     * @param bool $isLong
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function getClientIp($isLong=false)
    {
        return $isLong ? ip2long($_SERVER['REMOTE_ADDR']) : $_SERVER['REMOTE_ADDR'];
    }
}