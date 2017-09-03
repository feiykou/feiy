<?php
/*
 * ThinkPHP3.2.3 for SAE
 * for SAE 新浪云，提供了非常连接的服务器环境，但是也非常的稳定
 * 
 * ThinkPHP核心版本和完整版本的区别：
 * 核心版本：框架骨干内容
 * 完整版本：包括一些扩展类
 * 
 * 最终选择完整版本
 * 
 * 
 * 
 */


/*
 * 当一个页面同时出现两个函数名字相同就会报错，那么如果是两个类之间引用出现命名相同的情况。
 * 则解决办法是：php在5之后，提出了命名空间，命名空间namespace
 * namespace命名空间就是一个目录，它的名字可以是不存在的
 */
// namespace a1;
// function test(){
//     echo 1;
// }
// test();
// namespace a2;
// function test(){
//     echo 2;
// }

// test();


namespace a1;
class test1{
    static function test(){
        echo 1;
    }
}

namespace a2;
class test1{
    static function test(){
        echo 2;
    }
}
test1::test();