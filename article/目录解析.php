<?php
/*
 * application  应用目录     --- 网站
 * common       公用文件目录
 * home         前台模块
 * Admin        后台模块
 * runtime      应用运行产生的文件目录
 *      该目录是自动生成的，如果项目是在window下，不需要关注权限问题，因为会自动生成
 *      如果是在linux下，要给application目录可读写权限，否则会导致runtime文件无法生成，而使页面无法显示
 *  
 * public       公用静态文件目录（css,js,image...）
 * Thinkphp     核心框架目录
 * namespace    命名空间
 * 命名空间：简单来说就是一个虚拟目录（不一定虚拟的）
 * 命名空间诞生的原因是：解决命名冲突的问题
 * 为什么命名空间要使用一个真实存在的地址呢？
 * 答：以为自动加载机制，自动加载机制通过解析命名空间，可以很快找到对应的文件
 * 
 * 
 * IndexController.class.php
 * 控制器的名称采用驼峰法命名（首字母大写），控制器文件位于 Home(模块)/Controller/IndexController.class.php
 * 在thinkphp中，所有想要使用tp提供的函数，类文件等等的类必须继承controller类
 * thinkphp中每一个页面实际是一个方法
 * thinkphp类文件的命名规则是:前缀（自定义）+controller.class.php
 * 
 * 类文件放在模块下面的controller文件夹下面，不然加载不到
 * 
 * 模板页面载入方式：display();
 * 
 * 
 * use 路径; 加载文件
 * 开发流程：先做后台，再做前台；
 * 
 * 
 * 
 * 首页看到的内容实际上是home文件夹下controller目录下的IndexController.class.php中输出的
 */