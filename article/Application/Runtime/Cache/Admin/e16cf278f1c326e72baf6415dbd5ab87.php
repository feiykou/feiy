<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo ($lists[0]["title"]); ?></title>
<link rel="stylesheet" href="/feiyArticle/article/Public/bootstrap/css/bootstrap.css">

	<style>
		*{margin:0; padding:0;}
		body{font-family:"微软雅黑"; font-size:14px; color:#333;}
		.table{width:800px; margin:60px auto;}
		.clearfix{*zoom:1;}
		.clearfix:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0;}
		ul,li{list-style:none;}
	  	.wu-example{float:left;}
		.img-list{float:left;}
		.img-list li{position:relative; float:left; width:120px; height:120px; border:1px solid #ddd; padding:1px; margin-left:10px;}
	  	.img-list li img{width:100%; height:100%;}
		.img-list li .del{position:absolute; bottom:0; left:0;opacity:0.8; width:100%; height:22px; line-height:22px; text-align:center; background-color:#d7000f; color:#fff; cursor:pointer; font-size:12px;}
	  	.img-list li .del:hover{opacity:1;}
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

	<link rel="stylesheet" href="/feiyArticle/article/Public/uploader/webuploader.css">
	<!--引入webuploaderJS-->
	<script type="text/javascript" src="/feiyArticle/article/Public/uploader/webuploader.js"></script>

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
		    <label for="exampleInputPassword1">图片</label>
		    <div class="upload clearfix">
		    	<div id="uploader" class="wu-example">
				    <!--用来存放文件信息-->
				    <div id="thelist" class="uploader-list"></div>
				    <div class="btns">
				        <div id="update">选择文件</div>
				        <!--<button id="ctlBtn" class="btn btn-default">开始上传</button>-->
				    </div>
				</div>
				<ul class="img-list">
					
				</ul>
		    </div>	
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
		    <p><textarea id="container" name="content" placeholder="请填写内容..."></textarea></p>
		  </div>
		  <button type="submit" class="btn btn-primary">确认提交</button>
		</form>
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
	
	
    <script>
	    var uploader = WebUploader.create({
			
	        // swf文件路径,如果路径不对，则html则不会有效果
	        swf: '/feiyArticle/article/Public/uploader/Uploader.swf',
			
	        // 文件接收服务端。
	        server: '<?php echo U("uploadFile");?>',
	
	        // 选择文件的按钮。可选。
	        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
	        pick: '#update',
	        
	        //选完文件后，是否自动上传
	        auto:true,
	
	        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
	        resize: false,
	        //fileNumLimit: 5,
	        //sendAsBinary:true,  //指明使用二进制的方式上传文件
            //fileVal:"upload",   //指明参数名称，后台也用这个参数接收文件
           // fileSingleSizeLimit: 5242880,
           // 只允许选择图片文件格式
	        accept: {
	            title: 'Images',
	            extensions: 'gif,jpg,bmp,png',
	            mimeTypes: 'image/*'
	        }
	    });
	    //文件上传成功执行
	    uploader.on( 'uploadSuccess', function( file,data) {
	    	if(data.error==0){
	    		var html = "<li>"+
	    		"	<img src='/feiyArticle/article"+data.path+"'>"+
	    		"	<span class='del'>删除</span>"+
	    		"	<input type='hidden' name='path' value='"+data.path+"'>"+
	    		"</li>";
	    		$(".img-list").append(html);
	    	}
	    });
	    //文件上传失败执行
	    uploader.on( 'uploadError', function( file ) {
	    	console.log("失败"+file);
	    });
	    //文件上传之后，不管成功或失败都执行
	    uploader.on( 'uploadComplete', function( file ) {
	    	console.log("上传完成"+file);
	    });
	    
	    $(".img-list").on("click",'.del',function(){
	    	var path = $(this).prev().attr("src");
	    	var that = $(this);
	    	$.ajax({
	    		url:"<?php echo U('delImg');?>",
	    		data:{"path":path},
	    		type:"post",
	    		success:function(data){
	    			if(data.error==0){
	    				that.parent().remove();
	    				alert(data.msg);
	    			}
	    		}
	    	});
	    });
    </script>
    
    <!-- ueditor配置文件 -->
	<script type="text/javascript" src="/feiyArticle/article/Public/Ueditor/ueditor.config.js"></script>
	<!-- ueditor编辑器源码文件 -->
	<script type="text/javascript" src="/feiyArticle/article/Public/Ueditor/ueditor.all.min.js"></script>
	 <!-- 实例化编辑器 -->
	<script type="text/javascript">
		//主要针对不在同一层的文件调用编辑器
		window.UEDITOR_HOME_URL = "/feiyArticle/article/Public/Ueditor/";
		window.onload = function(){
			//注意：设置编辑器属性要在初始化编辑器之前设置，否则无效果
			window.UEDITOR_CONFIG.initialFrameWidth = 800;  //设置编辑框的宽度
		    window.UEDITOR_CONFIG.initialFrameHeight = 600; //设置编辑框的高度
		    //设置编辑器高度不自动加高
		  	window.UEDITOR_CONFIG.autoHeightEnabled=false;
			var ue = UE.getEditor('container');
		}
	</script>

	
</body>
</html>