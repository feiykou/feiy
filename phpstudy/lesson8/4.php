<?php
/*
 * 构造器：实例化对象就会执行的方法,不需要调用,放在类中的任意位置都不影响
 * function __construct($name,$age,$sex){
 *    //对象初始化 
 * }
 * 
 */

class mysql{
    function __construct(){
        $conn = mysql_connect("127.0.0.1","root","") or die("服务器连接失败");
        mysql_select_db("test");
    }
    
    function query($sql){//构造函数
        mysql_query($sql);
    }
    
    function __destrcut(){//析构函数
        echo '结束了';
    }
};

$mysql = new mysql();
$sql = "delete from stu where id=1";
$mysql->query($sql);
