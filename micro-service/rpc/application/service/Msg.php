<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/9
 * Time: 10:26 AM
 */

namespace service;


use yafr\yaf\Yar;

/**
 * Class Msg
 * @package service
 * User Jiang Haiqiang
 */
class Msg extends Yar
{
    /**
     * @param $params
     * @return bool
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function send($params)
    {
        sleep(1);
        return true;
    }


}