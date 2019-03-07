<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/7
 * Time: 10:44 PM
 */

require __DIR__.'/Cache.php';
require __DIR__.'/RedisCache.php';
require __DIR__.'/WaveCache.php';

$waveCache = new WaveCache();

$localCache = new Cache();
$localCache->prefix = 'wave:yac:';
$waveCache->localCache = $localCache;

$redis = new RedisCache();
$redis->host = '10.20.76.58';
$waveCache->redisCache = $redis;


$menu = $waveCache->waveGet('menu:1',function(){
    sleep(1);
    return [
        'id'    => '1',
        'name'  => 'yac',
        'time'  => time()
    ];
},5);

$beforeDelLocal = $localCache->get('menu:1');
$beforeDelRedis = $redis->get('menu:1');

$waveCache->waveDel('menu:1');

exit(json_encode([
    'get'   => $menu,
    'beforeDelLocal' => $beforeDelLocal,
    'beforeDelRedis' => $beforeDelRedis,
    'yac'   => $localCache->get('menu:1'),
    'redis' => $redis->get('menu:1')
]));