<?php
    /*
     * 知道思路，再动手
     *
     * 实例：101条数据，每页显示10条
     * 1、第一页显示的数据查询
     * select * from 表名 limit 0,10;
     * 第二页
     * select * from 表名 limit 10,10;
     *
     *
     * 分析：
     * 显示页显示的数据 公式
     * 1页   （当前页-1）*每页显示条数，每页显示多少条  0,10
     * 2页   （当前页-1）*每页显示条数，每页显示多少条  10,10
     * 如果用户请求的数据超出最大条数，显示最后页
     * 如果用户请求的数据小于最小条数，显示第一页
     *
     */
    
    header("content-type:text/html;charset=utf-8");
    include 'page.class.php';
    
    //查询总记录数
    $db = new mysqli("localhost","root","","stu","3306");
    $db->set_charset('utf8');
    $sql = "select * from stu";
    $result = $db->query($sql);
    
    $total = $result->num_rows; //获取条数 
    $num = 3;
    
    $page = new page($total,$num);
    $sql = "select * from stu {$page->limit}";
    $result = $db->query($sql);
    $arr = array();
    echo "<table border=1 width=800 cellspacing='0' align='center' >";
    echo "<tr><td>id</td><td>name</td><td>sex</td></tr>";
    while ($row = $result->fetch_assoc()){
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['sex']}</td></tr>";
//         $arr[] = $row;
    }
    echo "</table>";
    echo $page->show();
//     echo "<pre>";
//     var_dump($arr);
    
//     $page->show();
















