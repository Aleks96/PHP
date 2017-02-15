<?php
/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 12/01/2017
 * Time: 13:00
 */
// import configuration
require_once 'conf.php';



$tmpl = new template('main');

require_once 'lang.php';

// add pairs of temlate element names and real values
//$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');

// menu testing
// import menu file
require_once 'menu.php';
$tmpl->set('menu',$menu->parse());

require_once 'act.php';

// end of menu
$tmpl->set('nav_bar', $sess->user_data['username']);
//$tmpl->set('lang_bar', LANG_ID);
//$tmpl->set('content', 'minu sisu');




// output template content set up with real values
echo $tmpl->parse();
// database object test output
$sql = 'SELECT NOW()';
$res = $db->getArray($sql);
$sql = 'SELECT NOW()';
$res = $db->getArray($sql);
$sql = 'SELECT NOW()';
$res = $db->getArray($sql);
// control query log output
echo '<pre>';
print_r($sess);
echo '</pre>';

$sess -> flush();
$db->showHistory();
