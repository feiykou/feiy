<?php
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
 * 创建数据库  create database 数据库名 charset utf8;  建议在创建数据库时指定字符集，否则会乱码
 * 使用数据库   use 数据库;
 * 查看表   show tables;
 * 创建表   create table 表名(字段1 类型(长度),字段1 类型(长度),) engine myisam charset utf8;
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
 *   
 */
// mysql_query("sql语句") 执行sql语句
mysql_connect("localhost","root",""); //连接数据库
mysql_select_db("student"); //选择数据库
mysql_query("set names utf8"); //指定编码
$sql = "insert into students(name,age,score,sex) values ('卓儿','18','90','女')";
// $sql2 = "insert into `students`(`name`,`age`,`score`,`sex`) values ('卓儿','18','90','女')";

//添加
mysql_query($sql); // 执行sql语句
//删除
mysql_query("delete from students where id=1 or id=7");








