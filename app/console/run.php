#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/16
 * Time: 8:20 PM
 */

define("APPLICATION_PATH",  __DIR__);

require dirname(APPLICATION_PATH).'/common/bootstrap.php';

$app  = new Yaf\Application(ROOT ."/common/conf/application.ini");

$app->bootstrap();