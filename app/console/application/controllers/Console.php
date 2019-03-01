<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/21
 * Time: 7:51 AM
 */

/**
 * Class ConsoleController
 * User Jiang Haiqiang
 */
class ConsoleController extends \Yaf\Controller_Abstract
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
    public function startAction()
    {
        //$taskList = \yafr\com\Di::get('tasks');
        $taskList = CronModel::select();
        /**
         * @var \yafr\com\log\File $log
         */
        $log      = \yafr\com\Di::get('log');

        $log->info('start');

        foreach ($taskList as $task) {
            if($this->_canExecute($task['pattern'])) {
                //异步执行php脚本，只有一&执行才是异步
                $file = popen(APPLICATION_PATH.'/run.php '.$task['route'].' >/dev/null 2>&1 &', 'r');
                if($file) {
                    pclose($file);
                }
            }
        }
    }

    /**
     * @param string $pattern
     * @return bool
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected function _canExecute($pattern)
    {
        list($minute,$hour,$day,$month,$week) = explode(' ',$pattern);
        $weekResult = $this->_checkTime($week,(int)date('w',$this->_startTime));
        if(!$weekResult) {
            return false;
        }

        $monthResult = $this->_checkTime($month,(int)date('m',$this->_startTime));
        if(!$monthResult) {
            return false;
        }

        $dayResult = $this->_checkTime($day,(int)date('d',$this->_startTime));
        if(!$dayResult) {
            return false;
        }

        $hourResult = $this->_checkTime($hour,(int)date('H',$this->_startTime));
        if(!$hourResult) {
            return false;
        }

        $minuteResult = $this->_checkTime($minute,(int)date('i',$this->_startTime));
        if(!$minuteResult) {
            return false;
        }

        return true;
    }

    /**
     * @param string $express
     * @param int    $num
     * @return bool
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    protected function _checkTime($express,$num)
    {
        if($express === '*') {
            return true;
        }

        //1,3,5,15
        if(mb_strpos($express,',',null,'utf-8') !== false) {
            $items=explode(',',$express);
            return in_array($num,$items);
        }

        //1-10
        if(mb_strpos($express,'-',null,'utf-8') !== false) {
            list($start,$end)=explode('-',$express);
            return ((int)$start <= $num) && ((int)$end >= $num);
        }

        // */2
        if(mb_strpos($express,'/',null,'utf-8') !== false) {
            list($random,$per)=explode('/',$express);
            return ($num % (int)$per) === 0;
        }

        return (int)$express === (int)$num;
    }

    public function addAction()
    {
        CronModel::insert([
            'name'    => 'test',
            //每两个小时执行一次，前面的一定要有值
            'pattern' => '0 */2 * * *',
            'route'   => 'index test'
        ]);

        $result = CronModel::select();
        var_dump($result);
    }
}