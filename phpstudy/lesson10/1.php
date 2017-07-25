<?php

/*
 * const：定义，调用，赋值（从这三个方面理解）
 * 1、通过const定义类常量，不能加$
 * 2、通过const定义类常量必须有默认值
 * 3、在类中使用类常量格式，self::常量名称
 * 4、类常量不允许修改
 * 
 * 变量使用$this引用，常量使用self引用
 */

define("root","127.0.0.1");
class person{
    public $age = 16;
    public $name;
    const souce = '猴子';
    function __construct($name){
        $this->name = $name;
        
//         $this->age = $age;
//         echo "{$this->name},{$this->age}岁，他的先祖是".self::souce."<br>";
    }
}

$feiy = new person("飞扬");
$zhuo = new person("卓儿");
echo person::souce;







