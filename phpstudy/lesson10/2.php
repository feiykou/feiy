<?php

/*
 * static:
 * 1、静态变量关键字，调用self::$静态变量名
 * 2、静态属性存在静态代码段
 * 3、静态属性或方法可以使用类进行调用，它属于类
 * 4、脚本执行完之后，静态变量会自动销毁，无法手动销毁静态变量
 * 
 * 对象存在堆栈区
 * 静态的东西和对象无关，只和类有关
 * 
 * const和static的区别：
 * 1、const是不能被修改的，static是可以被修改的
 * 2、常量const是不需要$，因为是常量
 * 
 */

class test{
    //静态属性
    static $num = 1;
    const age = 18;
//     function __construct(){
//         self::$num = self::$num + 1;
//         echo self::$num;
//     }
    
    static function alert(){
        echo 1;
    }
}

// $test = new test();
// $test->alert();

echo test::alert();
echo test::age;

echo test::arr;
















