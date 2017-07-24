<?php
	echo "今天是7月11号";
	
	/**
	 * php的八种数据类型：
	 * 
	 * 4标量类型：int float string boolean
	 * boolean：true | false   1/0
	 * 
	 * 2复合类型：array object
	 * array:array(1,2,3,...)
	 * Object:new 对象()
	 * 
	 * 2特殊类型：resource 资源  null 空
	 * resource:从数据库查到的数据都是资源  resource#标识
	 * 
	 */
	
	
	$a = 1;
	var_dump($a);
	$b = 1.1;
	var_dump($b);
	
	if($a==$b){
		echo '相等';
	}else{
		echo "不等";
	}
	
	
?>