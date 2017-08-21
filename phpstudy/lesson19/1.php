<?php
header("content-type:text/html;charset=utf-8");
echo "<pre>";

/*
 * 边界匹配
 * ^   约束字符串的开头      [^] 取反
 * $   约束字符串的结尾
 * \b  匹配单词的开头和结尾      \B 不允许有边界
 * (?<=开始的位置) 从前往后定位原子的开始位置，但是不返回位置信息，不同于php系统函数strpos
 * (?=结束位置) 从后往前定位原子的结束位置，但是不返回位置信息
 * (?!x) 不是x
 * (?=x) 是x
 * (?:)  不缓存模式（简单来说，有括号也不返回结果）
 * 
 * 正则贪婪的特性：尽可能多的去匹配
 * 禁止正则贪婪：U
 * 
 * 执行一个全局正则表达式匹配，搜索subject中所有匹配pattern给定正则表达式 的匹配结果
 * preg_match_all(string $pattern , string $subject,[array &$matches])
 *  $pattern  正则表达式
 *  $subject  要匹配的字符串
 *  
 * 
 * 
 */


//匹配整数
// $str = "-1sdd33";
// $preg = "/^-?\d+$/";
// echo preg_match($preg,$str,$arr)?'是数字':'不是数字';
// echo $arr[0];


//匹配单词
// $str = "hello world kouguan";
// $preg = '/\b\w+\b/';
// preg_match_all($preg,$str,$arr);
// var_dump($arr);

// $preg = "/kou\B/";
// preg_match_all($preg,$str,$arr);
// var_dump($arr);


//正则贪婪的特性：尽可能多的去匹配
//禁止正则贪婪：U
$str = '<a href="https://www.baidu.com">百度</a>$nbsp;$nbsp;<a href="https://www.alibaba.com">阿里巴巴</a>';
// $p1 = strpos($str,'>');
// $e1 = strpos($str,'</');
// echo substr($str,$p1+1,$e1-$p1);

// $preg = "/>.*</U";
// preg_match_all($preg,$str,$arr);
// var_dump($arr);

//(?<=) 定义开始的位置
// $preg = '/(?<=">).*(?=<)/U';

/*
 * 找到b后面跟着的不是u的单词
 */
// $str = "bus banna busy bug hu ba bn";
// //! 非    ? 零个或1个      (?!)不等于     (?=)等于
// $preg = "/\bb(?!u)\w+\b/";


/*
 * 验证不是数字
 */
// $str = "1";
// // $preg = "/\D+/";
// $preg = "/[^\d]/";

// echo preg_match($preg,$str,$arr)?"不是数字":"是数字";



/*
 * 验证电话号码：85866302  8586630  021-85866302  0731-85866302
 */
// $str = "021-85866302";
// $preg = "/^(?:0\d{2,3}-)?\d{7,8}$/";
// //以上正则虽然验证了合法性，但是不能保证它的真实性



/*
 * 验证身份证
 * 18位
 */
// $str = "22345678912345678X";
// $preg = "/^[1-9]\d{16}[\dX]$/";
// echo preg_match($preg,$str,$arr)?'是身份证':'不是';

/*
 * 验证手机号
 */
// $preg = "/^1[34578]\d{9}$/";

/*
 * 验证邮箱
 * 23235.chuandong@qq.com
 * cf_sdasd@guasnd.com.tw
 */
// $str = "23235.chuandong@qq.com";
// $preg = "/^\w+(\.\w+)?@\w+.com(\.\w+)?$/";
// echo preg_match($preg,$str)?'是邮箱':'不是'; 


/*
 * baidu.com   www.baidu.com   https://www.baidu.com  https://m.baidu.com
 */
$str = "http://baidu.com";
$preg = "/^(https?:\/\/)?((m|w{3})\.)?\w+\.(com|cn)$/";
echo preg_match($preg,$str)?'是网站地址':'不是';






