#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/16
 * Time: 8:20 PM
 */

define("APPLICATION_PATH",  __DIR__);
define("ROOT",dirname(APPLICATION_PATH));

/**
 * 引入composer autoload
 */
require ROOT.'/vendor/autoload.php';

$app  = new Yaf\Application(dirname(APPLICATION_PATH) ."/common/conf/application.ini");

$app->bootstrap();