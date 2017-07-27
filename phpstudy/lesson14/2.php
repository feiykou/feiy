<?php
/*
 * PDO 使用PDO，则需要打开扩展：通过extension
 */
$db = new PDO("mysql:host=localhost;dbname=stu","root","");
$sql = "select * from `stu`";
$result = $db->query($sql);
$arr = array();
/*
 * FETCH_ASSOC 关联
 * BOTH 全部
 * NUM 索引
 */
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
    $arr[] = $row;
}

echo "<pre>";
var_dump($arr);











