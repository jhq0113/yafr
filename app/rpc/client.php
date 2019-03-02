<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/1
 * Time: 11:39 PM
 */

$client = new yar_client("http://127.0.0.1:8091/index.php");

var_dump($client->call('helloWorld',[]));