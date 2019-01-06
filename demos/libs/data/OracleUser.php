<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/6
 * Time: 2:45 PM
 */
namespace data;

class OracleUser
{
    /**
     * @return array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getInfo()
    {
        return [
            'driver' => 'oracle',
            'list'   => [
                [
                    'user_id' => 'o'
                ]
            ]
        ];
    }
}