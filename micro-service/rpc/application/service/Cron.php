<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/2
 * Time: 12:08 PM
 */

namespace service;

use yafr\yaf\Yar;

/**
 * Class Cron
 * @package service
 * User Jiang Haiqiang
 */
class Cron extends Yar
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected function _init()
    {
        if($_SERVER['REMOTE_ADDR'] !=='127.0.0.1' ){
            exit();
        }
    }

    /**
     * @param $a
     * @param $b
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function add($a,$b)
    {
        return $a+$b;
    }

    /**
     * @param array $params
     * @return array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function config($params=[])
    {
        return $this->dispatcher->getApplication()->getConfig()->toArray();
    }

    /**
     * @param $id
     * @return array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function info($id)
    {
        return \CronModel::getOne([
            'id' => $id
        ]);
    }
}