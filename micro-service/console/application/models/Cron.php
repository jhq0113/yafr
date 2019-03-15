<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/1
 * Time: 9:51 PM
 */

/**
 * Class CronModel
 * User Jiang Haiqiang
 */
class CronModel extends \yafr\com\model\Model implements \yafr\yaf\Storage
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public static $tableName='cron';

    /**
     * @return array|bool|mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getList()
    {
        // TODO: Implement getList() method.
        return self::select();
    }
}