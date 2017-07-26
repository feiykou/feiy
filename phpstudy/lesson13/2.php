<?php
    mysql_connect("127.0.0.1","root","");
    mysql_select_db("stu");
    mysql_query("set names utf8");
    //sql中判断是否相等使用"="  子查询的好处：减少判断
    $sql = "select * from stu s1 where EXISTS (select * from stu_work s2 where s1.id=s2.sid)";
//     $sql_work = "select * from stu_work";
    
    $result = mysql_query($sql);
//     $result_work = mysql_query($sql_work);
    $arr = array();
    while($row=mysql_fetch_assoc($result)){
        $arr[]=$row;
    }
    echo "<pre>";
    var_dump($arr);  
    
    die; //不执行后面的代码
    
    
    //获取工作学生的单数组
    $arr_work = array();
    while($row_work=mysql_fetch_assoc($result_work)){
        $arr_work[]=$row_work;
    }
    $work = array();
    foreach ($arr_work as $k=>$v){
        $work[] = $v['sid'];
    }
    
    //全部学生的数组信息
    $arr = array();
    while($row=mysql_fetch_assoc($result)){
        $arr[]=$row;
    }
    
    //获取正在工作的学生信息
    // $working = array();
    foreach ($arr as $k=>$v){
        if(!in_array($v["id"],$work)){
            //         $working[] = $v;
            unset($arr[$k]);
        }
    }
    
    echo "<pre>";
    var_dump($arr);