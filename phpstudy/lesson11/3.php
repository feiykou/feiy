<?php

class person{
    private $age = 18;
    protected $name = "feiy";
    public $sex =  "男";
    
    function __construct(){
//         echo 1;  sasd 
    }
    
    function __destruct(){
//         echo "脚本结束！";
    }
    
    function __get($key){
        echo "外部调用私有或者受保护的属性的时候自动触发__get<br>";
        return $this->$key;
    }
    
    function __set($key,$val){
        echo "外部修改私有或者受保护的属性时候自动触发__set<br>";
        return $this->$key = $val;
    }
}

$person = new person();
echo $person->name;
$person->sex = "看身份证";
echo $person->sex;
echo $person->name = "1";