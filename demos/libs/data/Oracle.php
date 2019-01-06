<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/6
 * Time: 2:06 PM
 */

namespace data;


class Oracle
{
    public $name='oracle';

    public function getInfo()
    {
        return [
            'driver' => 'oracle',
            'data'   => [
                [
                    'user_id' => '36'
                ]
            ]
        ];
    }
}