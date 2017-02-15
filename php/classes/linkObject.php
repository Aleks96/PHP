<?php

/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 18/01/2017
 * Time: 15:54
 */

//import http class file
require_once 'http.php';
function fixUrl($val){
    return urldecode($val);
}

class linkObject extends http
{

    //class variables
    var $baseUrl = false;    // Base URL value
    var $protocol = "http://";  // Protocol for URL;
    var $delim = "&amp;";  // & html tag
    var $eq = "=";  // equal sign
    var $aie = array('lang_id','sid'=>'sid');
    //class methods


    //constructor
    function __construct()
    {
        parent::__construct();
        $this->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }
    //create http data pairs and merge them
    //pair is element_name = element_value
    function addToLink(&$link,$name,$value){
        if($link !=''){
            $link = $link.$this->delim;
        }
        $link = $link.fixUrl($name).$this->eq.fixUrl($value);
    }

    //create url -> baseUrl + data pairs
    function getLink($add = array(), $aie = array(), $not = array()){
        $link = '';
        foreach ($add as $name => $val){
            $this->addToLink($link, $name, $val);
        }
        foreach ($aie as $name){
            $val = $this->get($name);
            if($val !== false){
                $this->addToLink($link, $name, $val);
            }
        }
        foreach ($this->aie as $name){
            $val = $this->get($name);
            if($val !== false and !in_array($name, $not)){
                $this->addToLink($link, $name, $val);
            }
        }
        // control, is link not empty - pairs is created
        if($link != ''){
            $link = $this->baseUrl.'?'.$link; // http://IP/path_to_script.php?name=value
        } else {
            $link = $this->baseUrl;
        }
        return $link; // return created link to base program
    }
}