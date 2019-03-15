<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/20
 * Time: 9:36 PM
 */

/**
 * Class IndexController
 * User Jiang Haiqiang
 */
class IndexController extends \Yaf\Controller_Abstract
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function indexAction()
    {
        exit(json_encode([
            'status' => '200',
            'data'   => [],
            'msg'    => 'operator success'
        ]));
    }
}