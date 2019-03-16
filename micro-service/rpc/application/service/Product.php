<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/16
 * Time: 10:32 PM
 */

namespace service;

use yafr\com\Di;
use yafr\com\log\File;
use yafr\yaf\Yar;

/**
 * Class Product
 * @package service
 * User Jiang Haiqiang
 */
class Product extends Yar
{
    /**
     * @param $params
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function add($params=[])
    {
        /**
         * @var File $log
         */
        $log = Di::get('log');
        $log->info('trace:{params}',[
            'params' => json_encode($params)
        ]);

        $params['id'] = time();

        return $params;
    }

    /**
     * @param array $params
     * @return bool
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function delete($params=[])
    {
        return true;
    }


}