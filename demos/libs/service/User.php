<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/6
 * Time: 2:43 PM
 */

namespace service;


use extend\Di;

class User
{
    /**
     * @var
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    private $_db;

    public function __construct()
    {
        //$this->_db = new \data\OracleUser();
        $this->_db = Di::get('dbUser');
    }

    /**
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getInfo()
    {
        return $this->_db->getInfo();
    }
}