<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/13
 * Time: 9:29 PM
 */

namespace yafr\yaf;

use Yaf\Dispatcher;
use yafr\com\Di;

/**
 * Class Yar
 * @package yafr\com\rpc
 * User Jiang Haiqiang
 */
class Yar
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