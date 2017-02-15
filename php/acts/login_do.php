<?php
/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 08/02/2017
 * Time: 11:07
 */

$username = $http->get('username');
$password = $http->get('password');

$sql = 'select * from user where '.'username='.fixDb($username).'AND '.'password='.fixDb(md5($password)).' AND '.'is_active=1';
$res = $db->getArray($sql);

if($res === false){
    $sess->set('login_error', tr("Viga sisenemisel"));

    $link = $http->getLink(array('act'=>'login'), array('username'));
    $http->redirect($link);
}else{
    $sess->createSession($res[0]);
    //print_r($res[0]);
    $http->redirect();
}