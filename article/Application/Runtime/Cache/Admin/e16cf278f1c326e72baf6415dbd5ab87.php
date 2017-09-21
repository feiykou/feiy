<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo ($lists[0]["title"]); ?></title>
<link rel="stylesheet" href="/feiystudy/article/Public/bootstrap/css/bootstrap.css">

<style>
	*{margin:0; padding:0;}
	body{font-family:"微软雅黑"; font-size:14px; color:#333;}
	.table{width:800px; margin:60px auto;}
</style>
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
        <li><a href="#">分类管理</a></li>
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
	<style>
		.form-con{width:800px; margin:50px auto;}
		.form-control:focus {
		    border-color: #66afe9;
		    outline: 0;
		    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
		    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
		}
		.text-area{width:600px; height:100px!important; outline:none; padding:10px; color:#666;}	
	</style>
	<div class="form-con">
		<form class="form2" method="post" action="<?php echo U('handleAdd');?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">文章标题</label>
		    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="<?php echo ($edita["title"]); ?>" placeholder="标题">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">文章描述</label>
		    <input type="text" name="des" class="form-control" id="exampleInputPassword1" value="<?php echo ($edita["des"]); ?>" placeholder="文章描述">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">所属分类</label>
		    <div class="dropdown">
			  	<select name="cateid" class="form-control">
			  		<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cateid']); ?>"><?php echo str_repeat($vo['html'],$vo['level']); echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			  	</select>
			</div>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">文章内容</label>
		    <p><textarea name="content" class="form-control text-area" placeholder="请填写内容..."><?php echo ($edita["content"]); ?></textarea></p>
		  </div>
		  <button type="submit" class="btn btn-primary">确认提交</button>
		</form>
	</div>
	

    <script type="text/javascript" src="/feiystudy/article/Public/bootstrap/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="/feiystudy/article/Public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>