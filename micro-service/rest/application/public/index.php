<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/30
 * Time: 5:32 PM
 */

define("APPLICATION_PATH", dirname(__DIR__));

require APPLICATION_PATH.'/conf/bootstrap.php';

$app  = new Yaf\Application(APPLICATION_PATH ."/conf/application.ini");
$app->bootstrap()
    ->run();