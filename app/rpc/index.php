<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/1
 * Time: 11:33 PM
 */
require __DIR__.'/Operator.php';

$server = new Yar_Server(new Operator());
$server->handle();