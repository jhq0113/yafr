<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/21
 * Time: 7:36 AM
 */

define("ROOT",dirname(__DIR__));

/**
 * 引入composer autoload
 * @var Composer\Autoload\ClassLoader $loader
 */
$loader =require ROOT.'/vendor/autoload.php';

$loader->setPsr4('common\\',[ __DIR__ ]);

return $loader;