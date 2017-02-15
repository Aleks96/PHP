<?php
/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 20/01/2017
 * Time: 08:53
 */

//define constants
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
define('ACTS_DIR', 'acts/');
define('LIB_DIR', 'lib/'); // useful functions directory
define('LANG_DIR','lang/');

require_once LIB_DIR.'utils.php';

define('DEFAULT_ACT','default');

define('ROLE_NONE', 0);
define('ROLE_ADMIN', 1);
define('ROLE_USER', 2);

define('DEFAULT_LANG', 'et');

//import classes
require_once CLASSES_DIR.'template.php'; //import template class file

require_once CLASSES_DIR.'http.php'; //imoport http class file

require_once CLASSES_DIR.'linkObject.php'; //import linkobject file

require_once CLASSES_DIR.'mysql.php'; //import database class file

require_once CLASSES_DIR.'session.php'; // impost session class file


require_once 'db_conf.php'; //import database configuration

//objects
//create linkobject object, because it extends http object
$http = new linkObject();
//create dabase class object
$db = new mysql(DBHOST,DBUSER,DBPASS,DBNAME);

$sess = new session($http, $db);
//language support
$siteLangs = array(
  'et' => "Estonian",
    'en' => "English",
    "ru" => "Russian"
);
$lang_id=$http->get('lang_id');
if(!isset($siteLangs[$lang_id])){
    $lang_id = DEFAULT_LANG;
    $http->set('lang_id',$lang_id);
}
define('LANG_ID',$lang_id);

require_once LIB_DIR.'trans.php';