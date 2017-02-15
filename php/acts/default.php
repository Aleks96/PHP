<?php
/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 20/01/2017
 * Time: 12:33
 */

$page_id = $http->get('page_id');

$sql = 'SELECT * FROM content WHERE  '.
        'content_id="'.$page_id.'"';

$res = $db->getArray($sql);

if ($res !== FALSE){
    $page = $res[0];
}