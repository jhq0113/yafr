<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/13
 * Time: 10:14 PM
 */

namespace yafr\yaf;

/**
 * Class ConfigStorage
 * @package yafr\yaf
 * User Jiang Haiqiang
 */
class ConfigStorage implements Storage
{
    /**
     * @var string
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $configFileName = '';

    /**
     * @var array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    private $_list = [];

    /**
     * @return array|mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getList()
    {
        // TODO: Implement getList() method.
        if(empty($this->_list)) {
            $this->_list = (new Yaf\Config\Ini($this->configFileName,ini_get('yaf.environ')))->toArray();
        }
        return $this->_list;
    }
}