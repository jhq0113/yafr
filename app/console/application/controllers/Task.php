<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/8
 * Time: 10:37 PM
 */

/**
 * Class TaskController
 * User Jiang Haiqiang
 */
class TaskController extends \Yaf\Controller_Abstract
{
    /**
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected $_startTime;

    /**
     * @var \common\libs\Queue
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected $_queue;

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

        $item = $this->_queue->pop($this->_config['channel']);

        //没有任务停止5秒，防止cpu空转
        if(empty($item)) {
            sleep(5);
        } else {
           $insertStatus = TaskListModel::insert([
               'task_config_id' => $this->_config['id'],
               'param'          => json_encode($item,JSON_UNESCAPED_UNICODE),
           ]);

           if($insertStatus < 1) {

               \yafr\com\Di::get('log')->error('配置[{id}],参数[{params}]入库失败',[
                   'id' => $this->_config['id'],
                   'param'          => json_encode($item,JSON_UNESCAPED_UNICODE),
               ]);

           } else {
               $insertId = TaskListModel::getLastInsertId();

               //调用rpc服务处理
               $client = new \Yar_Client($this->_config['rpc_address']);
               $status = $client->call($this->_config['rpc_method'],[ $item ]);

               $status = $status ? 1 : 2;

               TaskListModel::update([
                   'status'     => $status,
                   'deal_time'  => date('Y-m-d H:i:s')
               ],[
                   'id' => $insertId
               ]);
           }
        }

        $this->_doTask();
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function sendAction()
    {
        \yafr\com\Di::get('log')->info('send');

        $config = TaskConfigModel::getOne([
            'id' => 1
        ]);

        if(empty($config)) {
           return;
        }

        $this->_config = $config;

        $this->_queue = new \common\libs\Queue();
        $this->_queue->host = $this->_config['host'];
        $this->_queue->port = $this->_config['port'];
        $this->_queue->auth = $this->_config['auth'];
        $this->_queue->db   = $this->_config['db'];

        $this->_doTask();
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function addAction()
    {
        \yafr\com\Di::get('log')->info('add');

        $config = TaskConfigModel::getOne([
            'id' => 2
        ]);

        if(empty($config)) {
            return;
        }

        $this->_config = $config;

        $this->_queue = new \common\libs\Queue();
        $this->_queue->host = $this->_config['host'];
        $this->_queue->port = $this->_config['port'];
        $this->_queue->auth = $this->_config['auth'];
        $this->_queue->db   = $this->_config['db'];

        $this->_doTask();
    }
}