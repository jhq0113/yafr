<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/1
 * Time: 11:39 PM
 */

$client = new yar_client("http://127.0.0.1:8091/cron");

//var_dump($client->call('config',[]));
//var_dump($client->add(1,2));
var_dump($client->call('add',[3,2]));