<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/6
 * Time: 2:44 PM
 */

namespace data;

class MysqlUser
{
    /**
     * @return array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getInfo()
    {
        return [
            'driver' => 'mysql',
            'list'   => [
                [
                    'user_id' => 'o'
                ]
            ]
        ];
    }
}