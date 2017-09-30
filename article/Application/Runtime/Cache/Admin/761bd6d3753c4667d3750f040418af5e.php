<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>分类管理 - 飞扬</title>
<link rel="stylesheet" href="/feiyArticle/article/Public/bootstrap/css/bootstrap.css">

	<style>
		*{margin:0; padding:0;}
		body{font-family:"微软雅黑"; font-size:14px; color:#333;}
		.table{margin-top:30px;}
		.container{width:1200px; margin:0 auto;}
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
	      <ul class="nav navbar-nav" id="feiy-navbar-lists">
	        <li><a href="<?php echo U('Article/lists');?>">文章管理 <span class="sr-only">(current)</span></a></li>
	        <li><a href="<?php echo U('Cate/lists');?>">分类管理</a></li>
	        <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">权限管理 <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="<?php echo U('Group/lists');?>">角色管理</a></li>
				  <li><a href="<?php echo U('Rule/lists');?>">权限管理</a></li>
				  <li><a href="<?php echo U('User/lists');?>">用户管理</a></li>
				</ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left" method="post">
	        <div class="form-group">
	          <input type="text" name="key" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">搜索</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"><?php echo ($feiy_user['username']); ?></a></li>
	        <li class="dropdown">
	          <a href="<?php echo U('Access/logout');?>">退出登录</a>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div class="container">
		<div>
			<a class="btn btn-primary" href="<?php echo U('add');?>">添加</a>
		</div>
		
		<table class="table table-bordered table-hover">
	    	<thead>
	    		<tr>
	    			<th>分类id</th>
	    			<th>父类id</th>
	    			<th>分类名称</th>
	    			<th>操作</th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
		    			<td><?php echo ($v["cateid"]); ?></td>
		    			<!-- 
		    				判断的三种方式：
		    					1、if..else
		    					2、present标签 ：判断某个变量是否已经定义
		    					3、{变量|default=""} 如果变量不存在，则显示默认的值	
		    				
		    			-->
		    			<td>
		    				<!-- 如果pid为0，顶级分类，其他则填写对应的父类名称 -->
		    				<!--<?php if($v['pid']): echo ($v['pname']); else: ?>顶级分类<?php endif; ?> -->
		    				<!--<?php if(isset($v[pname])): echo ($v['pname']); else: ?>顶级分类<?php endif; ?>-->
		    				<?php echo ((isset($v["pname"]) && ($v["pname"] !== ""))?($v["pname"]):"顶级分类"); ?>
		    			</td>
		    			<!-- 
		    				重复一个字符串：str_repeat(字符串,重复次数)
		    				在标签中使用php函数，需要在函数前面加上:
		    			
		    			 -->
		    			<td><?php echo str_repeat($v['html'],$v['level']); echo ($v['name']); ?></td>
		    			<td><a href="<?php echo U('edit',array('id'=>$v['cateid']));?>">修改</a> | <a href="<?php echo U('delete',array('id'=>$v['cateid']));?>">删除</a></td>
		    		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    		<tr>
	    			<td colapan="6"><?php echo ($page); ?></td>
	    		</tr>
	    	</tbody>
	    </table>
	</div>

	
	<script type="text/javascript">
		/*
			nextElementSibling   获取下一个兄弟元素
			nextSibling          获取下一个兄弟节点
			
			forEach()中使用return;或者return false;只能结束一次循环，不能结束全部循环，不能使用break和continue
			$.each()使用return;或者return false;可以结束全部循环
			
			window.location.pathname == attr("href")
			
		*/
		$(function(){
			
			var localHref = location.href;
			$("#feiy-navbar-lists>li").each(function(index,obj){
				var $this = $(obj).children()[0];
				var liHref = $this.href;
				var $obj = $(obj);
				var mark = false;
				//判断是否有子菜单
				if($this.dataset.toggle){
					var sonlists = $this.nextElementSibling.children;
					var sonArr = [].slice.call(sonlists); //元素集合转换成数组方式 通过call改变内部对象引用方式
					sonArr.forEach(function(obj){
						liHref = obj.children[0].href;
						if(localHref==liHref){
							$obj = $(obj);
							mark = true;
							obj.parentElement.parentElement.className += " active";
						}
					});
				};
				//给选中的元素添加样式
				if(mark || localHref==liHref){
					$obj.addClass("active");
				};
			});
		});
	</script>
	
	
	
</body>
</html>