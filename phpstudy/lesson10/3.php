<?php
/*
 * abstract  抽象的
 * 1、抽象就是没有具体的实现方式
 * 2、既然没有具体的实现方式，那么它的方法代码块也就没有意义，大括号{}就可以省略不写
 * 3、有抽象方法的类必须是抽象类
 * 4、通过abstract定义的方法是抽象方法，通过abstract定义的类是抽象类
 * 5、基类的抽象方法子类必须重写
 */

abstract class handleDb{
    protected $host;
    protected $user;
    protected $pwd;
    protected $db;
    
    abstract function conn();
}


class mysql extends handleDb{
    function __construct(){
        
    }
    
    function conn(){
        
    }
}

class oracle extends handleDb{
    function __construct(){
    
    }
    
    function conn(){
    
    }
}



























