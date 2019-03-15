<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/13
 * Time: 9:57 PM
 */

namespace yafr\yaf;

/**
 * Class Task
 * @package yafr\yaf
 * User Jiang Haiqiang
 */
class Console extends \Yaf\Controller_Abstract
{
    /**
     * @var Storage
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $storage;

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
        $taskList = $this->storage->getList();

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
}