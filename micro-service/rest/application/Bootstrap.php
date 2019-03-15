<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/31
 * Time: 8:44 PM
 */

class Bootstrap extends \Yaf\Bootstrap_Abstract
{
    /**
     * 应用事件trait
     */
    use \extend\event\Event;

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initComponents(\Yaf\Dispatcher $dispatcher)
    {
        $config = \Yaf\Application::app()->getConfig();
        //\Yaf\Registry::set('config',$config);
        \extend\Di::set('dbUser',$config->toArray()['db']);

    }

    /**初始化日志组件
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initLog(\Yaf\Dispatcher $dispatcher)
    {
        $logConfig = \Yaf\Application::app()->getConfig()->toArray()['log'];
        $logConfig['fileName'] = $logConfig['logPath'].'/'.date('Y-m').'/'.date('d').'/yaf.log';
        unset($logConfig['logPath']);
        \extend\Di::set('log',$logConfig);

        \extend\Di::get('log')->debug('log set done!');
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initObserver(\Yaf\Dispatcher $dispatcher)
    {
        $nofifier = new \observer\Phone();

        $xiaoming = new \observer\Person();
        $xiaoming->name = 'Xiao Ming';

        $xiaohong = new \observer\Person();
        $xiaohong->name = 'Xiao Hong';

        $nofifier->attach($xiaoming);
        $nofifier->attach($xiaohong);
        $nofifier->dettach($xiaohong);

        \extend\Di::set('notifier',$nofifier);
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initEvent(\Yaf\Dispatcher $dispatcher)
    {
        $app = new \extend\App();
        \extend\Di::set('app',$app);

        $app->on('action:run',function(\extend\event\Entity $entity){
            \extend\Di::get('log')->info('事件:[{event}],数据：[{data}]',[
                'event' => $entity->name,
                'data'  => $entity->data
            ]);
        });

        $app->on('action:run',function(\extend\event\Entity $entity){
            \extend\Di::get('log')->info('事件:[{event}],数据：[{data}]',[
                'event' => $entity->name,
                'data'  => $entity->data - 1
            ]);
        });
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initSelf(\Yaf\Dispatcher $dispatcher)
    {
        $this->on('init',function(\extend\event\Entity $entity){
            \extend\Di::get('log')->info('bootstrap事件:[{event}]',[
                'event' => $entity->name,
            ]);
        });

        $this->trigger('init');
    }

    /**
     * @param \Yaf\Dispatcher $dispacher
     * @throws \Yaf\Exception\TypeError
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initRoute(\Yaf\Dispatcher $dispacher)
    {
        $router = $dispacher->getRouter();
        //$route = new \Yaf\Route\Simple('m','c','a');
        //$route = new \Yaf\Route\Supervar('r');

        /*$route = new \Yaf\Route\Regex(
                '#regex/(\d+)/(\d+)#',
                [
                    'module'      => 'rest',
                    'controller'  => 'route',
                    'action'      => 'index',
                ],
                [
                    1 => 'param1',
                    2 => 'param2',
                ]
        );*/

        /*$route = new \Yaf\Route\Rewrite(
            'rewrite/:param1/:param2',
            [
                'module'      => 'rest',
                'controller'  => 'route',
                'action'      => 'index',
            ]
        );

        $router->addRoute('rewrite',$route);*/

        $router->addConfig(\Yaf\Application::app()->getConfig()->routes);
    }


}