<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/3/6
 * Time: 9:35 PM
 */

require __DIR__.'/Cache.php';

$cache = new Cache();
$cache->prefix = 'test:';


/*$cache->set('key','value2',3);
$cache->mset([
    'ghjuyghyrjuiokoijhytrewsdgjiuy875rtfghjiklksafdasd' => time(),
    'age'      => time()%50,
    'sex'      => time()%2
]);

var_dump($cache->mget(['ghjuyghyrjuiokoijhytrewsdgjiuy875rtfghjiklksafdasd','age']));*/


$data = $cache->get('list');
if($data === false) {
    sleep(1);

    $data = [
        'userName' => 'sdfadf',
        'age'      => 40
    ];
    $cache->set('list',$data,60);
}

var_dump($cache->info());


/*$data = $cache->get('list');
if($data === false) {
    echo 'db';
}else {
    var_dump($data);
}*/


