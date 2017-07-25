<?php

/*
 * php选用mysql的原因：
 * 1、mysql是免费的
 * 2、执行效率快
 * 3、不涉及非常大的数据，在效率上没有太大的差异
 * 
 */

/*
 * 
 * 1、连接服务器
 *  1) 进入到mysql启动程序目录下
 *  2) 命令：mysql.exe -u 用户名 -p [密码 ,不建议直接写]
 * 2、查看数据库       show databases;
 *  1) 有->查看表
 *  2) 无->创建数据库->使用数据库->创建表
 *    查看数据库
 * 
 * 一、数据库的基础命令
 * 查看数据库       show databases;
 * 查看表中字段：show columns from 表; || describe 表; 
 * 创建数据库  create database 数据库名 charset utf8;  建议在创建数据库时指定字符集，否则会乱码
 * 使用数据库   use 数据库;
 * 查看表   show tables;
 * 删除表 drop table 表名;
 * 创建表   create table 表名(
 *      字段1 类型(长度),
 *      字段1 类型(长度),
 *      ) engine myisam charset utf8;
 * 重命名表  rename table odlname to newname;
 * 删除数据库：drop database 数据库名;
 * 查看表中字段：desc 表名;
 * 
 * 注：mysql命令行中 ;冒号代表语句结束
 *  
 *  
 *  二、数据库的增删改查
 *  中文出现乱码：程序编码，数据库编码，表字符串类型数据编码不一致；
 *  数据库的编码：数据库属性
 *  mysql常用关键词：
 *      or      或者
 *      and     并且
 *      between num1 and num2 在某个区间  包含num1和num2
 *      in      在某些指定的值中
 *  1、添加
 *    语法：insert into 表名(字段1,字段2,) value (值1,值2,);
 *    严谨写法：表名,字段名 需要使用``包起来   主要是防止和关键字冲突
 *    字段和值，需要一一对应
 *    值如果是字符串类型，需要用引号，否则会当成表字段处理
 *    主键字段通常设置为int型自增，在操作添加时可以不做处理
 *    实例："insert into students(name,age,score,sex) values ('卓儿','18','90','女')";
 *   2、删
 *    语法：
 *      1、delete from 表名  where id = 1 or id = 6; 
 *      2、delete from 表名  where id in(6,7); 
 *      3、delete from 表名  where id between 6 and 7;
 *      4、delete from 表名  where id > 6;
 *    解析：where后面是条件  or或者
 *    
 *    3、改
 *     语法：
 *      1、update 表名 set 字段1=值,字段2=值, where 条件; 
 *      
 *   
 *   通过第三方工具操作：以navicat for mysql
 *   phpstudy  用户名：root   密码：root
 *   wampserver  用户名：root   密码：
 *   引擎用的最多的是：myisam
 *   
 *   
 *   
 */
// mysql_query("sql语句") 执行sql语句
/*
 * 以下是面向过程的方式，5.6版本以上的php已经不支持以下的写法
 * 
 */
//@ 在前面加上@,不会报错
//为了不让别人看到数据库连接信息，需要在报错的代码前面写上@,
//or 是逻辑或的运算，前面正确后面不执行，前面错误，后面执行，逻辑断路
@mysql_connect("localhost","root","") or die("数据库连接失败！"); //连接数据库
mysql_select_db("mysql"); //选择数据库
mysql_query("set names utf8"); //指定编码,数据库查询的结果就是资源
$sql = "select * from mysql";
$rs = mysql_query($sql); //执行sql语句  返回的是资源，没办法使用
$arr = array();

//fetch_assoc()返回的是关联数组---用的频率最高，因为值对应的下标是确定的，而索引数组在数据字段发生变动的时候，会重新索引，下标是变动的
//fetch_array()返回的是包含关联和索引的数组
//fetch_row()  返回的是索引数组
while($row = mysql_fetch_assoc($rs)){ //mysql_fetch_assoc(资源)取出一行作为关联数组
    $arr[] = $row; //一整条记录是一行
}
echo "<pre>";
print_r($arr);


// $sql = "insert into students(name,age,score,sex) values ('卓儿','18','90','女')";
// // $sql2 = "insert into `students`(`name`,`age`,`score`,`sex`) values ('卓儿','18','90','女')";

// //添加
// mysql_query($sql); // 执行sql语句
// //删除
// mysql_query("delete from students where id=1 or id=7");








