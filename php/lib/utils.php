<?php
/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 08/02/2017
 * Time: 11:21
 */
function fixDb($val){
    		return '"'.addslashes($val).'"';
}