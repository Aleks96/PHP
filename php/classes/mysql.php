<?php

/**
 * Created by PhpStorm.
 * User: Aleksander
 * Date: 20/01/2017
 * Time: 08:59
 */
class mysql
{
    //class variables
    var $conn = false; //connection to database server
    var $host = false;  //database server name/IP
    var $user = false;  //database server user name
    var $pass = false;  //database server user pass
    var $dbname = false;  //which database to use
    var $history = array(); //database object log array

    function __construct($h,$u,$p,$dbn)
    {
        $this->host = $h;  //real database server name
        $this->user = $u;  //real database server user
        $this->pass = $p;  //real database server user password
        $this->dbname = $dbn;  //which database to use
        $this->connect();  //make the connection to the database
    }

    function connect(){
        $this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);
        if(mysqli_connect_error()){
            echo 'Viga andmebaasi ühendamisega<br/>';
            exit;
        }
    }
    // query time control
    function getMicrotime(){
        list ($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    //query database
    function query($sql){
        $begin = $this->getMicrotime();
        $res = mysqli_query($this->conn, $sql);
        if ($res === FALSE){
            echo 'Viga päringuga <b>'.$sql.'</b><br>';
            echo mysqli_error($this->conn).'<br>';
            exit;
        }
        $time = $this->getMicrotime()-$begin;
        $this->history[] = array(
            'sql' => $sql,
            'time' => $time
        );
        return $res;
    }
    function getArray($sql){
        $res = $this->query($sql);
        $data = array();
        while ($record = mysqli_fetch_assoc($res)){
            $data[] = $record;
        }
        if(count($data) == 0){
            return false;
        }
        return $data;
    }
    // log history output
    function showHistory()
    {
        if(count($this->history)>0){
            echo '<hr>';
            foreach ($this->history as $key=>$val){
                echo '<li>'.$val['sql'].'  -  ';
                echo '<strong>'.round($val['time'], 6).'</strong> sec </li>';
            }

        }
    }
}