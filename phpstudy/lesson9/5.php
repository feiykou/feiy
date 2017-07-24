<?php
/*
 * $this    指向实例化产生的对象，引用非静态类
 * 
 * const    定义类常量
 *          语义：const 名称     示例：const a
 *          类常量属于类，而不属于实例化产生的对象
 *          调用类常量的方式，  类名称::属性
 *          
 * self     指向类  self可以访问本类中的静态属性和静态方法,常量，可以访问父类中的静态属性和静态方法
 * 
 * parent   可用于调用父类中定义的成员方法
 */
class a{
    public $aa = 1;
    public $name = "person";
    
    const bb = 2; //类常量，属于类，而不属于类产生的对象
    function test(){
        echo $this->aa;
        echo self::bb;
        echo a::bb;
    }
}

class b extends a{
    public $name = "son";
    
    function testSon(){
        echo $this->name;
        echo parent::test();
//         $a = new a();
//         echo $a->name;
    }
}

//验证const，属于类，不实例化调用，a::bb;
//验证self，方法中使用self::常量|静态的
//验证this，方法中使用$this->属性|方法（排除静态和常量） 均可以使用



$a = new a();
// $a->test();
// echo a::bb; //2

$b = new b();
$b->testSon();//son







