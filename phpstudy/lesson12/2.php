<?php

class mysql{
    public $conn;
    public $table;
    
    function __construct($table){
        $conn = mysql_connect("localhost","root","");
        mysql_select_db("stu");
        mysql_query("set names utf8");
        $this->conn = $conn;
        $this->table = $table;
    }
    
    function save($arr,$where){
        $sql = "update {$this->table} set ";
        
        $string = "";
        foreach ($arr as $k=>$v){
            $string.="{$k}".'='."{$v}".',';
        }
        $string = rtrim($string,',');
        $sql.=$string.' where '.$where;
        mysql_query($sql);
    }
}

$mysql = new mysql("stu");
$arr = array('name'=>'feiy','age'=>25);
$mysql->save($arr,"id=1");