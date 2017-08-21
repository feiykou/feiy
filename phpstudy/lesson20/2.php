<?php
header("content-type:text/html;charset=utf-8");
echo "<pre>";

/*
 * 验证密码  必须有大写，必须有小写，必须有数字，长度6-12
 */

// $str = "asfF1a";
// $preg = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,12}$/";
// echo preg_match($preg,$str,$arr)?'有数字字母大小写':'没有匹配';
// var_dump($arr);

$str = "aAAAsfa1";
$preg = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,12}/";
echo preg_match($preg,$str,$arr)?'有数字字母大小写':'没有匹配';
var_dump($arr);