<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/1/19
 * Time: 5:24 PM
 */

namespace observer;

use extend\Di;
use extend\log\File;

/**
 * Class Person
 * @package observer
 * User Jiang Haiqiang
 */
class Person implements IObserver
{
    /**
     * @var
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public $name;

    /**
     * @param INotifier $notifier
     * @return mixed|void
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function update(INotifier $notifier)
    {
        // TODO: Implement update() method.
        /**
         * @var File $log
         */
        $log = Di::get('log');
        $log->info('{name}接收到通知者的状态是：'.$notifier->state,[
            'name' => $this->name
        ]);
    }
}