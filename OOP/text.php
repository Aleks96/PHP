<?php

/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 12/01/2017
 * Time: 10:52
 */
class text
{
    var $str ="";

    function __construct($sisu)
    {
        $this->setText($sisu);
    }

    //set classi meetod
    function setText($s){
        $this-> str = $s;
    }
    function show(){
        echo $this-> str .'</br>';
    }
} //end of class