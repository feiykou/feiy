<?php
/*
 * 字符串函数
 * 
 * 
 */
// $a = '123456789';
// echo strlen($a);//strlen()获取长度

/*
 * 案例： 假如我是一个小站长，我没有财力去聘请一个网站编辑人员，但是我仍然希望我的网站能够经常更新以获得
         搜索引擎更好的收录，问 怎么办 ？ 答案  ：通过程序来抓取页面内容
             
    1、确定目标网站：http://www.chinaz.com
    file_get_contents(args)：获取本地或者远程的数据，返回的时string
    
    2、分析目标代码
    3、确定要抓取的内容
     strpos("源字符串","要查找的字符串",[从哪个位置开始找])  查找一个字符串在另一个字符串中首次出现的位置
    4、获得内容
     substr("源字符串","从哪里开始截取",['截取多长'])
    5、处理数据
    
    fn(a,[b]):[b]有中括号的参数是有默认值的
    
 * */

    //1、确定目标网站：http://www.chinaz.com
    $content = file_get_contents("http://www.chinaz.com");
    //3、确定要抓取的内容
    $start = strpos($content,'<ul class="todynewslist mt10 clearfix">');
    $end = strpos($content,'</ul>',$start);
    $newsCon = substr($content,$start,$end-$start);
    $preg = '/<a.*href="(.*)" style="color:">(.*)<\/a>/';
    preg_match_all($preg, $newsCon,$arr);
    print_r($arr);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>通过字符串函数实现的简单的抓取</title>
<style>
	*{padding:0; margin:0;}
	ul,li{list-style:none;}
	.page{ width:600px; border:1px solid #ccc;}
	.page li{height:30px; line-height:30px; padding-left:10px; border-bottom:1px solid #ccc;}
	.page li a{text-decoration:none; color:#333;font-size:14px;}
    .page li a:hover{color:#d7000f; text-decoration:underline;}
</style>
</head>
<body>
	<div class="page">
		<?php 
		  echo $newsCon;
		?>
	</div>
</body>
</html>









