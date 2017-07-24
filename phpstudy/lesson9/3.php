<?php
//final 不可更改的
/*
 * 封装的原则：
 *  1、开放最小的权限，进行最大化的封装
 *  2、可以扩展，但不建议修改
 *  
 *  注意：被final修饰的方法或者属性，在子类中不能重写
 *  
 *  final:
 *   1、定义的方法不允许重写
 *   2、定义的类不允许继承
 *   3、本身及其它类调用均不受影响
 */
// 如果一个类被final修饰 ，那么它不能被其它类继承
final class person{
    final function live(){ //添加数据
        echo "赚100花200";
    }
    
    final function getAge(){
        echo "父亲年龄28";
    }
    
    function eat(){
        echo "吃米饭";
    }
}

class female extends person{
    function eat(){
        echo "吃面食";
    } 
}

$female = new female();
// $mysql->delete();
// $female->live(); //如果父类属性或者方法被final修饰，则子类不能重写

$person = new person();
$person->eat();







