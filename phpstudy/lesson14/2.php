<?php

$db = new PDO("mysql:host=localhost;dbname=stu","root","");
$sql = "select * from `stu`";
$result = $db->query($sql);
$arr = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
    $arr[] = $row;
}

echo "<pre>";
var_dump($arr);











