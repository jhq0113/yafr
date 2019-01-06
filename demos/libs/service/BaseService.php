<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 1:43 PM
 */

namespace service;

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
    public function __construct($db)
    {
        $this->db = $db;
    }
}