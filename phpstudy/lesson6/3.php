<?php
/**
 * 字符串转数组
 * str_split(字符串) 分割字符串转为数组
 * implode ( string $glue , array $pieces ) 将一个一维数组的值转化为字符串
 * 
 * array_unique(数组名) 移除数组中重复的值
 * krsort(数组名) 对数组按照键名逆向排序
 * array_reverse ( array $array [, bool $preserve_keys = false ] ) 返回一个单元顺序相反的数组
 */

$split = "3423445896";
$sarr = str_split($split);
$sarr = array_unique($sarr);
// krsort($sarr); //索引倒序

$sarr = array_reverse($sarr);
$sarr = implode("",$sarr);
var_dump('<pre>');
var_dump($sarr);


/**
 * 
 * 案例2：
 * 取出字符串$str = "@www.taobao.com@www.baidu.com@";
 * 
 * explode ( string $delimiter , string $string [, int $limit ] ) 使用一个字符串分割另一个字符串  返回的是数组
 * array_filter ( array $array [, callable $callback [, int $flag = 0 ]] ) 过滤数组中的空字符（'',null,false,）
 * 
 * unset() 销毁指定的变量
 * 
 * */

$str = "@www.taobao.com@www.baidu.com@";
//第一种方式
// var_dump(array_filter(explode("@",$str)));

//第二种方式
$exarray = explode("@",$str);
foreach ($exarray as $k=>$v){
    if($v==""){
        unset($exarray[$k]);
    }
};
var_dump($exarray);












