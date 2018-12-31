<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2018/12/30
 * Time: 5:32 PM
 */

define("APPLICATION_PATH",  dirname(dirname(__FILE__)));

$app  = new Yaf\Application(APPLICATION_PATH . "/conf/application.ini");
$app->bootstrap()
    ->run();