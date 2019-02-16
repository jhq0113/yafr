<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/3
 * Time: 5:34 PM
 */

use Medoo\Medoo;

/**
 * 引入composer类自动加载
 */
require __DIR__.'/vendor/autoload.php';

\phpyaf\base\PObject::test();
exit();

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'orm',
    'server' => '10.20.76.58',
    'username' => 'orm',
    'password' => '123456'
]);

// Enjoy
$database->insert('orm_user', [
    'user_name' => 'foo',
    'password' => md5('foo@bar.com')
]);

$data = $database->select('orm_user', [
    'id',
    'user_name',
    'password'
], [
    'id' => 1
]);

echo json_encode($data);

//发布公开的composer库的步骤：
#1.注册一个packagist账号，登录
#2.检索一下报名是否已经在packagist存在，如果不存在，则可以使用
#3.在github上建立一个版本库
#4.定义composer.json文件，commit并且push到github
#5.在packagist网站点击submit,填写刚刚创建的版本库地址，进行关联
#6.使用tag进行版本管理