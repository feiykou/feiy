<?php
    header("content-type:text/html;charset=utf-8");
    echo "<pre>";
    $content = "我是网站内容";
?>

<!-- 
    业务逻辑和显示视图写在一个页面难维护，而且对开发者的要求很高
 -->

<!-- 
     模板引擎：让html页面通过某种方式，能够解析程序的语法
-->
<html>
	<body>
	
		<?php echo $content ?> == {$content}

		<!-- 
		      让一个前端写php代码肯定不行，但是写{$content}是可以的，前端写前端代码，后端写程序，这样互不影响，提高开发效率
		  mvc就应运而生
		 -->
	</body>
</html>

