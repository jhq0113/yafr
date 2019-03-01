<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/28
 * Time: 9:49 PM
 */

namespace common\libs;

use yafr\com\Di;
use Medoo\Medoo;

/**
 * Class Model
 * @package common\Model
 * User Jiang Haiqiang
 */
class Model
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static $tableName;

    /**
     * @return Medoo
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function getDb()
    {
        return Di::get('db');
    }

    /**返回上次插入的主键id
     * @return string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function getLastInsertId()
    {
        return static::getDb()->id();
    }

    /**返回受影响行数
     * @param array $data
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function insert(array $data)
    {
        $statement = static::getDb()->insert(static::$tableName,$data);
        if($statement) {
            return $statement->rowCount();
        }

        return 0;
    }

    /**查询
     * @param array|string $where
     * @param array|string $columns
     * @return array|bool
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function select($where=null,$columns='*')
    {
        return static::getDb()->select(static::$tableName,$columns,$where);
    }

    /**
     * @param array $data
     * @param array $where
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function update($data,$where)
    {
        $statement = static::getDb()->update(static::$tableName,$data,$where);
        if($statement) {
            return $statement->rowCount();
        }
        return 0;
    }

    /**
     * @param array $where
     * @return int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function delete($where)
    {
        $statement = static::getDb()->delete(static::$tableName,$where);
        if($statement) {
            return $statement->rowCount();
        }
        return 0;
    }

    /**
     * @param array  $where
     * @param string $columns
     * @return array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static function getOne($where,$columns='*')
    {
        return static::getDb()->get(static::$tableName,$columns,$where);
    }
}