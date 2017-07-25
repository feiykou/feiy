<?php
/*
 * 对象的多态
 * 子类可以拥有自己的特性（属性或者方法），这就实现了多态
 * 
 */
class bigRen{
    public $age = 28;
    
    function huaqian(){
        echo "大人会花钱";
    }
};
//extends  继承
class child extends bigRen{
    //继承中子类的多态
    function zhuanqian(){
        echo '小孩还会赚钱';
    }
    
    //继承中子类的覆盖
    function huaqian(){
        echo '小孩也会花钱';
    }
}

$child = new child();
$child->huaqian();
echo $child->age;
echo $child->zhuanqian();

