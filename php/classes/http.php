<?php

/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 17/01/2017
 * Time: 14:40
 */
//useful function
function fixHtml($val){
    return htmlentities($val);
}

class http
{// http begin
    // class variables
    var $server = array(); // server data
    var $vars = array(); // http data
    var $cookie = array(); // cookie data
    // Class methods
    // Class constructor for object initializing
    function __construct()
    {
        $this->init();
        $this->initConst();
    }

    // initialize class variables
    function init(){
        $this->server = $_SERVER; // Server data
        $this->cookie = $_COOKIE; // Cookie data
        $this->vars = array_merge($_GET,$_POST,$_FILES); // http data
    } // init
    // initialize some server constants

    function initConst(){
        // define array with some server elements
        $vars = array("REMOTE_ADDR","PHP_SELF","SCRIPT_NAME","HTTP_HOST");
        // control if constant is defined
        foreach ($vars as $var){
            if (!defined($var and isset($this->server[$var]))) {
                define($var, $this->server[$var]);
            }
        }
    }
    //delete http data element
    function del($name){
        if(isset($this->vars[$name])){
            unset($this->vars[$name]);
        }
    }// del

    // set up $this->vars array elements: element_name->element_value
    // $this->vars['user'] = 'test'
    function set($name,$val){
        $this->vars[$name] = $val;
    }
    function get($name, $fix = false){
        if(isset($this->vars[$name])){
            if($fix){
                return fixHtml($this->vars[$name]);
            }
            return $this->vars[$name];
        }
        return false;
    }
    function redirect($url = false){
        global $sess;
        $sess->flush();
        if($url == false){
            $url = $this->getLink();
        }
        $url = str_replace('&amp;', "&", $url);
        header('Location: '.$url);
        exit;
    }

}// http end