<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/13
 * Time: 10:03 PM
 */

namespace yafr\yaf;

use yafr\com\client\Yar;
use yafr\com\model\Model;
use yafr\com\queue\Queue;

/**
 * Class Task
 * @package yafr\yaf
 * User Jiang Haiqiang
 */
class Task extends \Yaf\Controller_Abstract
{
    /**
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected $_startTime;

    /**
     * @var Queue
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $queue;

    /**
     * @var  Model
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $taskModel;

    /**
     * @var array
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected $_config;

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function init()
    {
        $this->_startTime = time();
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected function _doTask()
    {
        if(time() - $this->_startTime >=60) {
            return;
        }

        $item = $this->queue->pop($this->_config['channel']);

        //没有任务停止5秒，防止cpu空转
        if(empty($item)) {
            sleep(5);
        } else {
            $insertStatus = $this->taskModel::insert([
                'task_config_id' => $this->_config['id'],
                'param'          => json_encode($item,JSON_UNESCAPED_UNICODE),
            ]);

            if($insertStatus < 1) {

                \yafr\com\Di::get('log')->error('配置[{id}],参数[{params}]入库失败',[
                    'id' => $this->_config['id'],
                    'param'          => json_encode($item,JSON_UNESCAPED_UNICODE),
                ]);

            } else {
                $insertId = $this->taskModel::getLastInsertId();

                //调用rpc服务处理
                $client = new Yar();
                $client->address = $this->_config['rpc_address'];
                $status = $client->call($this->_config['rpc_method'],$item);

                $status = $status ? 1 : 2;

                $this->taskModel::update([
                    'status'     => $status,
                    'deal_time'  => date('Y-m-d H:i:s')
                ],[
                    'id' => $insertId
                ]);
            }
        }

        $this->_doTask();
    }
}