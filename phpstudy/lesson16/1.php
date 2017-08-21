<?php
/*
 * __autoload() 创建实例化对象时，会去调用相对应的文件
 * 框架一定要有命名规则
 */

header("content-type:text/html;charset=utf8");

function __autoload($class){
//     echo $class;
    include 'class/'.$class.'.php';
}


//实例化--自动调用__autoload方法
// $obj = new fenye();
// $obj->flist();

//http://localhost/feiystudy/phpstudy/lesson16/1.php?c=fenye&a=index
//通过 地址栏，c传递类名字，a传递方法名字
//类名和方法都是变量，可以访问任意的class文件，灵活性较强


//通过传递不同的参数，就可以访问不同的页面
//Home一般值得是前台，admin指的是后台
$m = isset($_GET['m']) ? $_GET['m'] : 'Home';
$c = isset($_GET['c']) ? $_GET['c'] : 'fenye';
$a = isset($_GET['a']) ? $_GET['a'] : 'index';

$cobj = new $c();
$cobj->$a();

/*
 * 单入口模式：
 *  执行任何操作，都访问的是一个文件，通过这个文件进行引用和调用，
 *  文件之间的相互访问，那么入口文件就是根目录，从而不用纠结各种文件相互引用导致的错乱
 *  
 */