<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加分类 - 飞扬</title>
<link rel="stylesheet" href="/feiyArticle/article/Public/bootstrap/css/bootstrap.css">

	<style>
		*{margin:0; padding:0;}
		body{font-family:"微软雅黑"; font-size:14px; color:#333;}
		.table{width:800px; margin:60px auto;}
		.form-con{width:800px; margin:50px auto;}
		.form-control:focus {
		    border-color: #66afe9;
		    outline: 0;
		    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
		    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
		}
		.text-area{width:600px; height:100px!important; outline:none; padding:10px; color:#666;}	
	</style>

<script type="text/javascript" src="/feiyArticle/article/Public/bootstrap/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/feiyArticle/article/Public/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
	 <nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Brand</a>
	    </div> 
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="<?php echo U('Article/lists');?>">文章管理 <span class="sr-only">(current)</span></a></li>
	        <li><a href="<?php echo U('Cate/lists');?>">分类管理</a></li>
	      </ul>
	      <form class="navbar-form navbar-left" method="post">
	        <div class="form-group">
	          <input type="text" name="key" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">搜索</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">admin</a></li>
	        <li class="dropdown">
	          <a href="/feiystudy/article/index.php/Admin/Access/logout.html">退出登录</a>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div class="form-con">
		<form action="<?php echo U('handleAdd');?>" method="post">
		  <div class="form-group">
		  	<label for="exampleInputEmail1">分类名称</label>
		    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo ($edita["title"]); ?>" placeholder="标题">
		  </div>
		  <div class="form-group">
		  	<label for="exampleInputEmail1">分类名称</label>
		  	<!--
		  		输出时间的四种方式：
		  		 <?php echo date('Y-m-d',$time);?>  Y:输出的是详细年份eg:2017 y:输出的是后两位eg:17
		  		 <?php echo date('Y-m-d') ?>
		  		 <?php echo date('Y-m-d') ?>
		  		 <?php echo (date('Y-m-d',$time )); ?> //这种方式只支持date函数
		  		 以上四种比较简洁的是第一种
		  	 -->

		  	
		  	<div class="dropdown">
			  	<select name="pid" class="form-control">
			  		<option value="0">顶级分类</option>
			  		<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cateid"]); ?>"><?php echo str_repeat($vo['html'],$vo['level']); echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			  	</select>
			 </div>
		  </div> 
		  
		
		
		  <button type="submit" class="btn btn-primary">确认提交</button>
		
		
		</form>
	</div>

	
	
</body>
</html>