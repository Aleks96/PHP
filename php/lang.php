<?php
/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 13/02/2017
 * Time: 09:35
 */
$sep = new template('lang.sep');
$sep = $sep->parse();
$count = 0;

foreach($siteLangs as $lang_id => $lang_name) {
    $count++;
    if ($lang_id == LANG_ID) {
        $item = new template('lang.active');
    } else {
        $item = new template('lang.item');
    }
    $link = $http->getLink(array('lang_id' => $lang_id), array('act', 'page_id'), array('lang_id'));
    $item->set('link', $link);
    $item->set('name', $lang_name);
    $tmpl->add('lang_bar', $item->parse());

    if ($count < count($siteLangs)) {
        $tmpl->add('lang_bar', $sep);
    }
}