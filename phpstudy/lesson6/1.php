<?php
/**
 * 
 * 数组：存储1个或者多个值的变量，每个元素都有唯一的标识
 * 定义：变量 = array();
 * 注：
 *  1、下标从0开始
 *  2、当索引相同时，后面会覆盖前面的
 * 
 * 索引数组：下标为数字的数组，通过数组[下标]查询
 * 关联数组：下标为字符串的数组，通过数组[键名]查询
 * 索引数组和关联数组可以一起共存，key 为可选项。如果未指定，PHP 将自动使用之前用过的最大 integer 键名加上 1 作为新的键名
 * 
 * 
 *  key会有如下的强制转换：
 *  '1',1,true 都是1
 *  浮点型和布尔型最后都会转换为整型
 *  1）浮点型小数部分会舍弃
 *  2）true 1   false 0
 *  
 *  
 */

/**
 * 数组每个元素都有一个唯一的标识，如果在定义的时候唯一的标识相同，则取最后一个
 */
$arr = array(1=>'1','1'=>3);
// var_dump($arr);


/**
 * 最后一个数组单元之后的逗号可以省略。通常用于单行数组定义中，例如常用 array(1, 2) 而不是  
 * array(1, 2, )。对多行数组定义通常保留最后一个逗号，这样要添加一个新单元时更方便。 
 */
$arr = array(
    array('name'=>'xiaoming','age'=>16,'sex'=>'男','address'=>'中国'),
    array('name'=>'xiaomi','age'=>16,'sex'=>'男','address'=>'美国'),
    array('name'=>'xiaomin','age'=>16,'sex'=>'男','address'=>'中国'),
);



/**
 * count(数组)：获取数组长度
 */
$num = count($arr)-1;
for($i=0;$i<=$num;$i++){
    if($arr[$i]['name']=='xiaomi'){
        var_dump('<pre>');
        var_dump($arr[$i]);
    }
};



/**
 * 循环获取数组值
 * foreach(数组 as 自定义变量(键)$i => 另一个自定义变量(值)$v){
 *      代码块;
 * };
 * 注：$i可以省略
 * die;和exit;让代码终止执行
 */

// foreach ($arr as $i => $v){
//     if($v['name']=="xiaomi"){
//         var_dump('<pre>');
//         var_dump($v);
//     }
// };

foreach ($arr as $v){
    if($v['name']=="xiaomi"){
        var_dump('<pre>');
        var_dump($v);
    }
    exit;
};












