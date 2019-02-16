<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/2/2
 * Time: 8:32 PM
 */
require __DIR__.'/Db.php';
require __DIR__.'/ActiveRecord.php';
require __DIR__.'/User.php';


$db = new Db();

$db->dsn = 'mysql:host=10.20.76.58;port=3306;dbname=orm;charset=utf8';
$db->username='orm';
$db->password='123456';

$user = new User();
$user->db = $db;

/*$count = $user->insert([
    'user_name' => uniqid('orm'),
    'password'  => md5(uniqid())
]);*/

/*$count = $user->multiInsert([
    [
        'user_name' => uniqid('multi1'),
        'password'  => md5(uniqid())
    ],
    [
        'user_name' => uniqid('multi2'),
        'password'  => md5(uniqid())
    ]
]);*/

/*$count = $user->update(' user_name=\'update\'','id=1');
$count = $user->update([
    'user_name' => 'array_in_update'
],[
    'id'=> [1,2,3,4,5]
]);*/

/*$count = $user->delete([
    'id' => [4]
]);*/

$users = $user->select('','','',[
    'id'=>'DESC'
],[
    'offset' => 2,
    'number' => 2
]);

var_dump($users);


/*$count = $db->execute('INSERT INTO orm_user(user_name,password)VALUES(:user1,:password1),(:user2,:password2)',[
    ':user1'     => uniqid('user'),
    ':password1' => md5(uniqid()),
    ':user2'     => uniqid('user2'),
    ':password2' => md5(uniqid())
]);*/

/*$rows = $db->query('SELECT * FROM orm_user WHERE id=:id',[
    ':id' => 1
]);

var_dump($rows);*/