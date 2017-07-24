<?php
	/**
	 *	PHP_VERSION   版本号
	 * 
	 *	魔术常量
	 * 		__FILE__  获取当前文件绝对路径
	 *   	__DIR__   获取当前文件所在的文件夹名  5.3版本以后支持
	 *   	__LINE__; 返回行号
	 *      __FUNCTION__ 返回方法名
	 *      __METHOD__ 返回类名::方法名
	 *      __CLASS__ 返回类名
	 *
	 * 	魔术方法：
	 * 		在某个时刻自动触发
	 * 		function __construct(){} new对象触发
	 * 		function __destruct(){}  脚本执行完触发
	 *   	function __get(){} //外部调用私有方法或属性，自动触发
	 *
	 * 
	 * 	dirname() 获取当前文件所在的文件夹名
	 */
	
	// echo __FILE__; //C:\wamp\www\phpstudy\lesson11\1.php
	// echo __DIR__; //C:\wamp\www\phpstudy\lesson11


	// $dir = dirname(__FILE__);
	//把路径中的\替换成/
	$dir = str_replace('\\', '/', dirname(__FILE__)); //C:/wamp/www/phpstudy/lesson11

	echo "<br>返回行号：".__LINE__."<br>";
	function feiy(){
		echo "<br>返回方法名：".__FUNCTION__."<br>";
	}
	class feiyclass{
		function ss(){
			echo "<br>返回类名::方法名：".__METHOD__."<br>";
			echo "<br>返回类名：".__CLASS__."<br>";
		}
	}
	
	$feiy = new feiyclass();
	feiyclass::ss();
	$feiy->ss();

	feiy();

	echo $dir;