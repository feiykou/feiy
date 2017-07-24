<?php

/**
 * array(1,2,3,4,5,6,7,8,9),列出所有俩俩相加为10的组合
 */



/**
 * 第二种方式：array_search
 * 在数组中搜索给定的值，如果成功则返回相应的键名 ,否则返回false
 */
$arr = array(1,2,3,4,5,6,7,8,9);
foreach ($arr as $v){
    if($v>=5){
        break;
    }
    $num = 10 - $v;
    $key = array_search($num, $arr);
    if($key){
        $new[] = "{$v},{$arr[$key]}";
    }
};
var_dump("<pre>",$new);
die();

/**
 * 第一种方式：枚举法  --- 就是一个一个试，没有思路可言，但是完成需求
 */
$arr = array(1,2,3,4,5,6,7,8,9);
$new = array();
foreach ($arr as $v){
    foreach ($arr as $vi){
        if($v>=5){
            break;
        }
        $sum = $v+$vi;
        if($sum == 10){
            $new[] = "{$v},{$vi}";
        }
    }
}
echo "<pre>";
var_dump($new);

/**
 * 数组动态添加值：
 *  $new = array();
 *  $new[] = 值;
 * 
 * 数组删除值：
 *  unset($arr[key]);
 */




























