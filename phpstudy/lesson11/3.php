<?php

/*
 * 魔术方法：
 *  __construct
 *  __destruct
 *  __get($key){
 *      return $this->$key;
 *  }
 *  __set($key,$val){
 *      return $this->$key = $val;
 *  }
 *  
 *  __toString(){
 *      return 字符串;
 *      注意：1、必须使用return关键字返回
 *      2、返回的结果必须是字符串类型的数据
 *  }
 * 
 */
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
    
    function __set($key,$val){
        echo "获取私有或者受保护的属性或方法===>";
        return $this->$key = $val;
    }
    
    function __toString(){
        return '直接输出对象是不合法的';
    }
}

$person = new person();
echo $person->age."===>";
echo $person->sex."===>";
echo $person->sex = '女==>';















