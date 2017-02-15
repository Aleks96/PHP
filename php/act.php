<?php
/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 20/01/2017
 * Time: 12:11
 */
$act = $http->get('act');

$fn = ACTS_DIR.str_replace(".","/",$act).'.php';
if(file_exists($fn) and is_file($fn) and is_readable($fn)){
    require_once $fn;
} else {
    $fn = ACTS_DIR.DEFAULT_ACT.'.php';
    $http->set('act',DEFAULT_ACT);
    require_once $fn;
}