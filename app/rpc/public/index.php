<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/30
 * Time: 5:32 PM
 */

define("APPLICATION_PATH",  dirname(__DIR__));
define("ROOT",dirname(APPLICATION_PATH));

/**
 * @var $loader \Composer\Autoload\ClassLoader
 */
$loader = require ROOT.'/common/bootstrap.php';

$loader->setPsr4('service\\',[ APPLICATION_PATH.'/application/service' ]);

$app  = new Yaf\Application(ROOT ."/common/conf/application.ini");
$app->bootstrap();