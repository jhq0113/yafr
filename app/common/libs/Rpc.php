<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/2
 * Time: 11:11 AM
 */

namespace common\libs;

use Yaf\Dispatcher;
use yafr\com\Di;

/**
 * Class Rpc
 * @package common\libs
 * User Jiang Haiqiang
 */
class Rpc
{
    /**
     * @var Dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $dispatcher;

    /**
     * Rpc constructor.
     * @param array $config
     */
    public function __construct($config=[])
    {
        Di::block($this,$config);

        if(method_exists($this,'_init')) {
            $this->_init();
        }
    }
}