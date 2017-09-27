<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style>
	*{margin:0; padding:0;}
	body{
		font-size:14px;
		font-family:'微软雅黑';
		color:#333;
	}
	h1.tit{
		text-align:center;
		height:60px;
		line-height:60px;
		margin:20px 0;
	}
</style>
</head>
<body>
	
	<h1 class="tit"><?php echo ($lists["title"]); ?></h1>
	<div class="container">
		<?php echo ($lists["content"]); ?>
	</div>
	
</body>
</html>