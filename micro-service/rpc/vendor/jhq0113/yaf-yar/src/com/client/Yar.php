<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/13
 * Time: 10:08 PM
 */

namespace yafr\com\client;

/**
 * Class Yar
 * @package yafr\com\client
 * User Jiang Haiqiang
 */
class Yar
{
    /**
     * @var
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $address;

    /**
     * @var \Yar_Client
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    private $_client;

    /**
     * @return \Yar_Client
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function getClient()
    {
        if($this->_client instanceof \Yar_Client) {
            return $this->_client;
        }
        $this->_client = new \Yar_Client($this->address);

        return $this->_client;
    }

    /**
     * @param string $method
     * @param array  $params
     * @return mixed
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function call($method,array $params=[])
    {
        return $this->getClient()->call($method,[ $params ]);
    }
}