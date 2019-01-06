<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 1:43 PM
 */

namespace service;

use extend\Di;

/**
 * Class BaseService
 * @package service
 * User Jiang Haiqiang
 */
class BaseService
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $db;

    /**
     * BaseService constructor.
     * @param string $db
     */
    public function __construct()
    {
        $this->db = Di::get('db');
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function show()
    {
        Di::get('db');
        exit(json_encode($this->db->getInfo(),JSON_UNESCAPED_UNICODE));
    }
}