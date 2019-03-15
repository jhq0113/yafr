<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/15
 * Time: 9:25 PM
 */

$loader = require dirname(APPLICATION_PATH).'/vendor/autoload.php';

$loader->setPsr4('service\\',[ APPLICATION_PATH.'/service' ]);