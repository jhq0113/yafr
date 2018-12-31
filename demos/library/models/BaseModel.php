<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 1:12 PM
 */

namespace models;

/**
 * Class BaseModel
 * @package models
 * User Jiang Haiqiang
 */
class BaseModel
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $tableName;

    /**
     * BaseModel constructor.
     * @param string $tableName
     */
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }
}