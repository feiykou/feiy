<?php
	/**
	 * php的函数
	 * 
	 * 函数的定义：能完成特定业务逻辑的代码段
	 * 
	 */
	
	/**
	 * 案例1：找出$str = 'asdsafafasdsav';中d首次出现的位置
	 */
	$str = 'asdsafafasdsav'; //找出$str中d首次出现的位置
	$arr = str_split($str);
	//第一个方案
	foreach($arr as $k => $v){
		if($v == 'd'){
			echo $k;
			break;
		}
	};
	
	//第二种方案
	echo strpos($str,'d');
	
	
	/**
	 * 案例2：统计$str = 'asdsafafasdsadassav';的长度
	 */
	$str2 = 'asdsafafasdsadassav';
	echo "<br/>str2==".strlen($str2);
?>