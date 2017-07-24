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
 * parent   可用于调用父类中定义的成员方法（公共的）和静态量
 * 
 * protected:外部无法调用，只有在内部或者子类中调用
 * private：只有内部可以调用，外部和子类不可以调用
 * public：都可以调用
 * 
 * final：
 */
class a{
    const aa ='<br>常量可以使用self来引用<br>';
    public $bb = "<br>this引用变量<br>";
    private $cc = "cc";
    protected $dd = "dd";
    function test(){
       echo "我是父类！";
       echo $this->bb; //$this调用非静态量
       echo self::aa; //self调用常量，不变量
    }
    
    function pricc(){
        echo $this->cc;
    }
    
    
}

class b extends a{
    function test1(){
        echo parent::aa;
        echo parent::test();
        echo self::test();
        echo parent::pricc();
        echo $this->dd;
    }
}

$b = new b();
$b->test();
$b->test1();








