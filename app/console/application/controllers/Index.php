<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/19
 * Time: 9:33 PM
 */

/**
 * Class IndexController
 * User Jiang Haiqiang
 */
class IndexController extends \Yaf\Controller_Abstract
{
    /**
     * @var int
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected $_startTime;

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
    public function indexAction()
    {
        /**
         * @var \yafr\com\log\File $log
         */
        $log      = \yafr\com\Di::get('log');
        $log->info('index');
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function testAction()
    {
        /**
         * @var \yafr\com\log\File $log
         */
        $log      = \yafr\com\Di::get('log');
        $log->info('test');
    }

    /**
     * @param int $second
     * @param callable $callback
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected function _second($second,callable $callback)
    {
        if(time() - $this->_startTime >=60) {
            return;
        }

        call_user_func($callback);
        sleep($second);
        $this->_second($second,$callback);
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function secondAction()
    {
        /**
         * @var \yafr\com\log\File $log
         */
        $log      = \yafr\com\Di::get('log');

       $this->_second(5,function() use ($log){
          $data = CronModel::select();
          $log->info('select:'.json_encode($data,JSON_UNESCAPED_UNICODE));
       });
    }

    public function pushAction()
    {
        $queue = new \common\libs\Queue();
        $queue->host = '10.20.76.58';
        $queue->port = 6379;
        $queue->db   = 0;

        $queue->push('msg',[
            'userId'   => time(),
            'uniquid'  => uniqid()
        ]);
    }

    public function addAction()
    {
        $queue = new \common\libs\Queue();
        $queue->host = '10.20.76.58';
        $queue->port = 6379;
        $queue->db   = 0;

        $queue->push('jifen:add',[
            'userId'   => time(),
            'uniquid'  => uniqid()
        ]);
    }
}