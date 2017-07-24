<?php
/*
 * 面向对象：php既可以面向对象，也可以面向过程  在php开发的过程中使用面向对象
 * 类：类是一类有共同属性或者方法的事物的集合
 * 对象：对象是类的实例化
 * 
 * 面向过程（也是一种编程思想）：强调功能的本身，实现某种功能
 * 面向对象：一种编程思想，强调的是找到对象，调用对象的方法和属性
 * 面向对象的编程方式：先找有没有现成的对象，有=>调用，没有=>创建对象=>调用
 * 1、方便调用（简洁）
 * 2、重用性强
 * 
 * class语法：
 * ren           类名  自定义
 * $age,$name    属性 自定义
 * open()        方法 自定义
 * class ren(){ //ren自定义
 *  [$age]
 *  [$name]
 *  [$sex]
 *  function open(){
 *      
 *  }
 * }
 * 方法和属性的调用---需要先实例化产生对象
 * $newObj = new ren();
 * 属性调用
 * $newObj->name;
 * 方法调用
 * $newObj->open();
 * 
 * 对象的三大特性：封装，继承，多态
 * 封装：成员方法都被封装起来
 * 继承：使用extends关键词继承基类，那么子类就拥有基类的相关属性和方法
 * 多态：子类可以拥有自己的特性（属性或者方法），这就实现了多态
 * 
 * 构造方法：
 * __construct 名称不可以自定义， 实例化对象就会执行的方法,不需要调用,放在类中的任意位置都不影响
 * __destrcut  名称不可以自定义，垃圾回收函数（析构函数），当脚本走完之后，会自动调用
 *  1、脚本执行完，自动执行
 *  2、通过unset(对象)手动清除 从而来触发__destrcut（储存对象的变量被销毁的时候自动执行，监听销毁）
 * 
 * 如果脚本执行几个小时，中间产生的垃圾不想占用内存，可以手工清理
 * 
 * unset(对象);//释放对象
 * 但是在php中，有自动回收机制 function __destrcut(){} 当脚本走完之后，会自动调用
 * 
 * 
 * 
 */

// 数据库操作-面向过程
// mysql_connect("127.0.0.1","root","");//连接服务器
// mysql_select_db("student"); //要查找的数据库名
// $sql = "select * form student";
// mysql_query($sql); //执行sql语句

// 数据库操作-面向对象的方式更加简洁，重用
// $mysqli = new mysqli();
// $mysqli->query($link, $query);


