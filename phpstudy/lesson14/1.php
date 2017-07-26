<?php
/*
 * mysqli 是mysql的增强版本
 * 
 */

@$mysqli = new mysqli("127.0.0.1","root","","stu");
if($mysqli->connect_errno){
    die('服务器连接失败！');
}
$mysqli->set_charset("utf8");
$sql = "select * from `stu`";
$result = $mysqli->query($sql);
$arr = array();
while ($row = $result->fetch_assoc()){
    $arr[] = $row;
}

echo "<pre>";
var_dump($arr);

