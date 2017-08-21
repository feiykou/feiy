<?php
header("content-type:text/html;charset=utf8");
// $a = $_GET['money'];

/*
 * preg_match($pattern,$subject,$arr)
 * $pattern 正则表达式
 * $subject 要匹配的字符串
 * $arr     把匹配的结果保存到$arr数组中
 */

/*
 *  '^'以...开头
 *  '$'以...结尾 
 *  \d 代表0~9任意一个数字
 *  \d+ 一个或多个
 *  {}可能
 *  ?
 */
// $preg = '/^\d+(\.\d{1,2})?$/';
// $c = preg_match($preg,$a,$arr);

// echo "<pre>";
// var_dump($c);
// print_r($arr);

/*
 * 一、什么叫做原子？
 *  在正则中，任意的单字符都是原子
 * 1、特殊的原子？
 * \d  0-9的任意1个数字  \D 取反
 * \w  数字  字母 和_    \W 除了数字  字母 和_ 
 * \s  空格                               \S
 * .   除换行符以外的任意单字符
 * 
 * 
 * 2、原子表
 *  表现形式：[原子一个或多个 ]
 *  匹配[]中任意的原子即返回成功
 *  
 *  ^ 放在外边是约束边界，放在原子表里是取反：[^]
 *  
 *  
 * 3、原子组
 *  表现形式：(原子一个或多个)
 *  匹配()中全部的原子才返回成功,()中匹配的元素可以被捕获，显示在数组中
 * 
 * 4、正则的重复匹配
 * {}约定重复次数
 * {6,12}  匹配6-12次
 * {3}     匹配3次
 * {2,}    匹配最少两次
 *  ?      匹配前一项0次或1次
 *  +      匹配前一项1次或多次
 *  *      匹配前一项0次或多次
 *  
 * 使用{}注意：{num1,num2}代表可以重复num1-num2次，超过则截取到num2，解决办法是使用$(结尾)
 * 
 * 5、贪婪模式
 * 
 * 
 * 
 * 
 */

/*
 * \w
 */
// $preg = '/\W/';

/*
 * \s
 */
// $preg = '/\s+/';




//如下字符串里只有存在c,d,f中任意一个就是为真
// $str = "123abc456";
// // $preg = '/c|d|f/';
// // /cdf/的意思是连着cdf
// // [cdf]匹配cdf任意一个
// $preg = '/[cdf]/';
// if(preg_match($preg,$str)){
//     echo "匹配到了！";
// }else{
//     echo "没有";
// }



/*
 * abc和(abc) 加括号和不加括号的区别：
 * () 可以用来捕获，捕获的内容会加在数组中，数组中的第一项是完整匹配，第二项是()捕获项
 *
 */
// $str = '<a href="www.baidu.com">百度</a>';
// $preg = '/<a\s+href="(.*)">(.+)<\/a>/';
// // $preg = '#(com)#';
// if(preg_match($preg,$str,$arr)){
//     echo "匹配到了！";
//     echo "<pre>";
//     var_dump($arr);
// }else{
//     echo "没有";
// }


/*
 * /\d/
 * /[0-9a-z]/ 中间的-代表的不是一个原子
 */


/*
 * 正则的书写规则：
 * 1、可以使用一切不会造成正则混淆的字符来当做边界符
 * eg:$preg = '#(com)#'; 尽量使用习惯的使用方式：/
 * 2、正则默认是对大小写敏感的（但是可以使用修饰符忽略大小写）
 * 
 */

/*
 * 案例：要求密码长度是6-12位
 * 
 */
//第一种方式：php密码验证
// if(strlen($_GET['pwd'])>6 && strlen($_GET['pwd'])<12){
//     echo "验证通过！";
// }else{
//     echo "不符合规则！";
// }

//第二种方式：正则表达式
// $preg = '/^\w{6,12}$/';
// if(preg_match($preg,$_GET['pwd'],$arr)){
//     echo "验证通过！";
//     echo "<pre>";
//     var_dump($arr);
// }else{
//     echo "不符合规则！";
// }


/*
 * 案例：匹配数字
 * 1.1  1  -1,1
 * */
// $preg = '/^-?\d++(\.\d)?$/';
// if(preg_match($preg,$_GET['pwd'],$arr)){
//     echo "验证通过！";
//     echo "<pre>";
//     var_dump($arr);
// }else{
//     echo "不符合规则！";
// }


/*
 * 表单不允许为空
 * 
 */
// $preg = '/^\w+$/';
// if(preg_match($preg,$_GET['pwd'],$arr)){
//     echo "验证通过！";
//     echo "<pre>";
//     var_dump($arr);
// }else{
//     echo "不符合规则！";
// }


/*
 * 贪婪模式：
 * U 禁止贪婪匹配  
 * $str = "aaaab";
   $preg = '/a{1,}/U'; //a
   $preg = '/a{1,}/'; //aaaa
 * 
 */

$str = "aaaab";
$preg = '/a{1,}/U';
if(preg_match($preg,$str,$arr)){
    echo "验证通过！";
    echo "<pre>";
    var_dump($arr);
}else{
    echo "不符合规则！";
}

/*
 * i 忽略大小写
 */
// $str = "abc";
// $preg = '/A/i';
// if(preg_match($preg,$str,$arr)){
//     echo "验证通过！";
//     echo "<pre>";
//     var_dump($arr);
// }else{
//     echo "不符合规则！";
// }












