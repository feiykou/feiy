<?php
header("content-type:text/html;charset=utf-8");
echo "<pre>";

/*
 * 模式修正符：
 * U   禁止贪婪模式
 * i   忽略大小写
 * s   视为单行
 * s使.能够匹配换行符，即把字符串视为单行进行处理
 * 
 * 正则函数
 * preg_match
 * preg_match_all
 * 
 * //返回给定数组input中与模式pattern 匹配的元素组成的数组. 
 * preg_grep(string $pattern , array $input [, int $flags = 0 ] )
 * 
 * //通过一个正则表达式分隔给定字符串
 * array preg_split ( string $pattern , string $subject [, int $limit = -1 [, int $flags = 0 ]] )
 * 
 * //正则匹配替换
 * preg_replace($preg,$replace,$str);
 * 
 * 
 * 正则默认是单行匹配
 * 
 */

/*
 * 贪婪模式：默认进行最大化的匹配
 * ?和U都可以做到禁止贪婪
 */
// $str = "abbbsd";
// $preg = "/ab*/U";
// $preg = "/ab+/U";


/*
 * i  忽略大小写
 */
// $str = "abc";
// $preg = "/A/i";


// $str = array("horse","hot","hit");
// // $str =  implode(" ",$str);
// $preg = "/\bh(?!o)\w+\b/";
// $arr = preg_grep($preg,$str);
// var_dump($arr);


// echo preg_match_all($preg,$str,$arr)?'匹配到了':'没有';
// var_dump($arr);

/*
 * 字符串{索引}
 */

// $str = "123456";
// echo $str{2};


/*
 * 得到所有的网址
 */
// $str = "@taobao.com@sina.com@qq.com@@baidu.com@163.com";
//使用php函数
// $arr = explode("@",$str); //字符串转数组
// $arr = array_filter($arr); //过滤掉空的

// $preg = "/(?<=@)(?:.*)(?=@)/U";
// preg_match_all($preg,$str,$arr);
// $arr = array_filter($arr[0]);

// $preg = "/@/";
// $arr = preg_split($preg,$str,-1,PREG_SPLIT_NO_EMPTY);

$str = "品牌的车子真是好啊，你可以去官网<a href='https://www.baidu.com' >百度</a>看我的车子，你还是留在<a href='https://localhost/lesson'>网站</a>";
// $preg = "/<a\s+href=['\"].*['\"]\s*>.*<\/a>/";
// $replace = "localhost";

$preg = array(
    "/<a href='https:\/\/www.baidu.com' >/",
    "/<a href='https:\/\/localhost\/lesson'>(.*)<\/a>/"
);
//  \\1获取()中的匹配的内容
$replace = array(
    '',"<strong style='color:red;'>\\1</strong>"
);
echo preg_replace($preg,$replace,$str);
// var_dump($arr);

//$replace和$preg原理
// $a1 = array('小姐','贩毒');
// $count = count($a1);
// for($i=0;$i<$count;$i++){
//     $a2[$i] = "#";
// }

$str = "a
    b";
//加上s之后，'.'就可以包括任意字符
preg_match("/.*/s",$str,$arr);
var_dump($arr);


