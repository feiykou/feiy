<?php

/**
 * 通过函数的方式使$a == $b;
 */

$a = 'fedccba';
$b = 'abcdef';

/**
 * 第一种方式
 * 
 * str_replace()替换
 */
// $a = str_replace($a, $b, $a);

/**
 * 第二种方式：str_repeat($a,复制次数)
 */

// $b = str_repeat($a,1);

/**
 * 第三种方式：先翻转截取替换
 * strrev()  翻转
 * substr_replace($string, $replacement, $start);
 */
$a = strrev($a); //翻转
$a = substr_replace($a, substr($b,strpos($b,'c')), strpos($a,'c'));


if($a==$b){
    echo '相等';
}else{
    echo '不相等';
};










