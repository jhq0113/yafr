<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/16
 * Time: 10:36 PM
 */

use yafr\com\Di;
/**
 * Class ProductController
 * User Jiang Haiqiang
 */
class ProductController extends \Yaf\Controller_Abstract
{
    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function addAction()
    {
       /**
         * @var \sdk\Service $service
         */
        $service = Di::get('service');
        $serviceConfig = $service->find('product');
        /**
         * @var \yafr\com\client\Yar $client
         */
        $client = Di::createObject($serviceConfig);

        $result = $client->call('add',[
            'proudctName' => uniqid('productName:'),
            'price'       => mt_rand(23,34)
        ]);

        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }

    /**
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function serviceAction()
    {
        /**
         * @var \sdk\Service $service
         */
        $service = Di::get('service');
        $service->register('product',[
            'class'     => 'yafr\com\client\Yar',
            'address'   => 'http://127.0.0.1:8081/product',
        ]);
    }
}