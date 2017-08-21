<?php

header("content-type:text/html;charset=utf8");

//登录产生用户的唯一标识，有这个标识那么就可以访问，否则不可以；
if(!isset($_SESSION['id'])){
    echo "你没有登录，无权访问！";
}


