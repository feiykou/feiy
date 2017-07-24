<?php
/*
 * 对象的继承
 * 使用extends关键词继承基类，那么子类就拥有基类的相关属性和方法
 * 注意：如果基类中在属性或者方法设置private权限，则子类无法调用
 * 
 */
class bigRen{
    public $age = 28;
    
    private function huaqian(){
        echo "大人会花钱";
    }
};
//extends  继承
class child extends bigRen{
    
}

$child = new child();
$child->huaqian();
echo $child->age;

