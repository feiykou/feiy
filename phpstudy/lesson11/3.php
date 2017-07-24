<?php

class person{
    public $name = 'feiy';
    private $age = 18;
    protected $sex = '男';
    
    
    function __construct(){
        echo "构造函数===>";
    }
    
    function __destruct(){
        echo '结束了！';
    }
    
    function __get($key){
        echo "获取私有或者受保护的属性或方法===>";
        return $this->$key;
    }
    
}

$person = new person();
echo $person->age."===>";
echo $person->sex."===>";
















