<?php

/*
 * 
 * 
 */

/*
 * 构造一个单例
 * 1、封死构造方法  private
 * 2、添加getConn方法，设置static public修饰
 * 3、在getConn方法中设置条件判断
 * 4、调用：类名::getConn();
 */
class car{
    public $wright = 100;
    static $conn = null;
    public function run(){
        return '汽车可以在公路上跑！';
    }
    
    final private function __construct(){
        
    }
    
    static public function getConn(){
        if(is_null(self::$conn)){
            self::$conn = new self();
        }
        return self::$conn;
    }
    
}

class bentian extends car{
    
}

//无论new多少次，他们都是相等的，减少内存开销，这就是单例模式
$car = car::getConn();
// $runcar = car::getConn();
$runcar = new bentian();
// $runcar = new car();
echo intval($car===$runcar);
// echo intval(1.6); //1 强制转换，小数会舍去小数













