#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/16
 * Time: 8:20 PM
 */

define("APPLICATION_PATH",  __DIR__);

require APPLICATION_PATH.'/conf/bootstrap.php';

$app  = new Yaf\Application(APPLICATION_PATH ."/conf/application.ini");

$app->bootstrap();