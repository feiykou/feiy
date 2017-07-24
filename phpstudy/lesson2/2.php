<?php
	//忽略全部报错
//	error_reporting(0);

	//忽略notice报错
//	error_reporting(E_ALL^E_NOTICE);

	//判断某个变量是否存在
	//isset(变量名) 
	
	//获取变量的数据类型和值
	var_dump($_POST); 
	
	/**
	 * 接收form传值的三种方式
	 * 第一种方式：$_POST
	 * 该种方式只可以接收post请求，安全性比较高，post比get传递的数据量更大
	 * 
	 * 第二种方式：$_GET
	 * 该种方式可以接收到post和get请求，但是只用于get请求
	 * 最常见的get传值，显示在url地址上，安全性较低
	 * 
	 * 第三种：$_REQUEST可以接收post和get两种方式的传值
	 * 注意：传递值的效率比较低，----能者多劳，效率低
	 * 什么时候用$_REQUEST？
	 * 答：在不清楚外部使用什么方式传递数据的时候用requset
	 * 
	 * 注意：
	 * 	1、并不是点击提交按钮，菜可以接收表单里面的信息；
	 */
	
	if(isset($_POST['btn'])){
		$user = $_POST['user'];
		if($user){
			echo "输入的用户名是$user";
		}else{
			echo "请重新输入用户名";
		}
	}
?>

<meta charset="utf-8" />
<form method="post" action="">
	<input type="text" name="user"/>
	<input type="submit" name="btn" value="提交" />
</form>