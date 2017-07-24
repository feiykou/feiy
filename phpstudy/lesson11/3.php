<?php

class person{
    private $age = 18;
    protected $name = "feiy";
    public $sex = "男";
    
    function __construct(){
//         echo 1;
    }
    
    function __destruct(){
//         echo "脚本结束！";
    }
    
    function __get($key){
        echo "外部调用私有或者受保护的属性的时候自动触发<br>";
        return $this->$key;
    }
}

$person = new person();
// echo $person->name;
echo $person->sex;