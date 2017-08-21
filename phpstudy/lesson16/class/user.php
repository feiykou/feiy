<?php
    class user{
        
        function __construct(){
            //登录产生用户的唯一标识，有这个标识那么就可以访问，否则不可以；
            if(!isset($_SESSION['id'])){
                echo("你没有登录，无权访问！");
//                 echo "你没有登录，无权访问！";        
            }
        }
        
        function reg(){
            echo "这是注册";
        }
        function login(){
            echo "这是登录";
        }
        function pay(){
            echo "这是支付";
        }
        function info(){
            echo "用户信息";
        }
    }