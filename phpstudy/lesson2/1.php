<?php
/*================= boolean为假的六种可能 ==========================*/
/**
 * boolean 布尔型 true/false
 * 注：任何其他类型的数据类型都可以强制转换成boolean
 * 
 * boolean为假的情况：
 * int 0
 * float 0.0
 * string 1:字符串为空 ''
 * 		  2:字符串值为0
 * 
 * boolean false
 * array  空数组 array()
 * null  空类型
 * 
 */

//$a = array();
//
//if($a){
//	var_dump($a);
//	echo "为真";
//}else{
//	var_dump($a);
//	echo "为假";
//};


/*================= boolean为假的六种可能实例 ==========================*/
/**
 * boolean为假的六种可能：
 * $a = null    NULL 为假
 * $a = 0       int(0) 为假
 * $a = 0.0     float(0) 为假
 * $a = ''      string(0) "" 为假
 * $a = '0'     string(1) "0" 为假
 * $a = array() array(0) { } 为假
 * 
 * 注意点：
 * 	$a = ' '字符串中空格也代表一个字符，是为真
 * 
 */




/*================= 变量 ==========================*/
/**
 * 变量：可变的量叫变量
 * 变量的定义：
 * 	1、$+字母下划线开头，接着字母数组下划线甚至是中文都可以（不建议使用）
 * 	2、存在同名变量的时候，后面的覆盖前面的
 * 	3、变量区分大小写
 * 
 * 变量的检测：
 * 	1、isset  检测变量是否定义过，与值无关
 * 	目的：是否存在某一个变量,输出值是boolean类型，false是未定义，true是定义了
 * 
 * 	2、empty:用来检测值
 * 
 * 变量的删除：
 * 	1、脚本执行完php自动释放
 * 	2、unset(变量)
 * 
 * 变量的类型：
 * 	1、自定义变量   $a = 'web';
 * 	2、可变变量       $$a = 'http://www.baidu.com';  把一个变量的值作为另一个变量的名
 * 	3、外部变量
 * 
 * 
 * 
 */

//变量的检测
echo "变量的检测======================<br>";
$_ = "1";
var_dump(isset($a)); //bool(false)
var_dump(isset($_)); //bool(true)

echo "<br><br><br>变量的类型======================<br>";
//变量的类型
$c = 'web'; //自定义变量
$$c = 'http://www.baidu.com'; //可变变量
// echo $web;


/*================= 常量 ==========================*/
/**
 * 常量：定义后不能更改的量叫常量
 * 定义：define('名称','值')
 * 注意：名称需要加引号，输出使用echo 名称; 这里名称不用引号
 * 
 * 检测：defined('名称')
 * 
 */
echo "<br><br><br>变量的类型======================<br>";
define('a',2);
if(!defined('a')){
	define('a',1);
}else{
	echo '已经定义过';
}

//echo a;
//define('a',2);//已定义的常量不能再次赋值


/*================= 删除变量 ==========================*/
/**
 * unset(变量);
 * 判断是否删除：isset()
 */
$time = "今天12点的时间戳";
echo $time;
unset($time); //删除变量 内存空间删除
var_dump(isset($time)); //因为浏览器缓存的原因，变量仍然会存在

/*================= 3个基础输出 | 打印的函数 ==========================*/
/**
 * 1、echo  用来输出简单的数据类型 int floor string
 * 2、print_r  可以用来输出全类型的值
 * 3、var_dump 可以用来输出数据的类型和值
 * 后两者是用来调试数据,可以有目的的选择输出方式
 * 
 * int floor string boolean
 * 
 */
echo "<br />======echo======<br />";
echo true; //1
echo false;//不显示
echo array(1);//Array


echo "<br />======print_r======<br />";
print_r(true); //1
print_r(false);//不显示
print_r(array(1));//Array ( [0] => 1 )

echo "<br />======var_dump======<br />";
var_dump(true); //bool(true)
var_dump(false);//bool(false)
var_dump(array(1));//array(1) { [0]=> int(1) }

$n = array('name'=>'xiaoming',
	 array(3,4,5),
	 array('sex'=>4)
);
echo '<pre>';
print_r($n);

var_dump($n);


?>

