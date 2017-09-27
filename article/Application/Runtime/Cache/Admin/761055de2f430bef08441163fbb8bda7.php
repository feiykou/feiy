<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo ($lists[0]["title"]); ?></title>
<link rel="stylesheet" href="/feiyArticle/article/Public/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="/feiyArticle/article/Public/uploader/webuploader.css">
<script type="text/javascript" src="/feiyArticle/article/Public/bootstrap/js/jquery-1.12.4.min.js"></script>
<!--引入webuploaderJS-->
<script type="text/javascript" src="/feiyArticle/article/Public/uploader/webuploader.js"></script>

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
		<form class="form2">
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
		  <style>
			.clearfix{*zoom:1;}
			.clearfix:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0;}
			ul,li{list-style:none;}
		  	.wu-example{float:left;}
			.img-list{float:left;}
			.img-list li{position:relative; float:left; width:120px; height:120px; border:1px solid #ddd; padding:1px; margin-left:10px;}
		  	.img-list li img{width:100%; height:100%;}
			.img-list li .del{position:absolute; bottom:0; left:0;opacity:0.8; width:100%; height:22px; line-height:22px; text-align:center; background-color:#d7000f; color:#fff; cursor:pointer; font-size:12px;}
		  	.img-list li .del:hover{opacity:1;}
		  </style>
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
		    <label for="exampleInputFile">文章内容</label>
		    <p><textarea id="container" name="content" placeholder="请填写内容..."><?php echo ($edita["content"]); ?></textarea></p>
		  </div>
		  <button type="submit" class="btn btn-primary">确认提交</button>
		</form>
	</div>
	<table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>文章标题</th>
    			<th>所属分类</th>
    			<th>文章描述</th>
    			<th>添加时间</th>
    			<th>点击数</th>
    			<th>操作</th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td><?php echo ($edita['title']); ?></td>
    			<td><?php echo ($edita['cateid']); ?></td>
    			<td><?php echo ($edita['des']); ?></td>
    			<td><a href="<?php echo U('edit',array('id'=>$edita['articleid']));?>">修改</a> | <a href="<?php echo U('delete',array('id'=>$v['articleid']));?>">删除</a></td>
    		</tr>
    	</tbody>
    </table>

    <script type="text/javascript" src="/feiyArticle/article/Public/bootstrap/js/bootstrap.min.js"></script>
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
	    	$(this).parent().remove();
	    	$(".img-list").append("<input type='hidden' name='path' value=''>");
	    });
	    
	    if('<?php echo ($edita["path"]); ?>'!=''){
	    	var html = "<li>"+
    		"	<img src='/feiyArticle/article<?php echo ($edita["path"]); ?>'>"+
    		"	<span class='del'>删除</span>"+
    		"	<input type='hidden' name='path' value='<?php echo ($edita["path"]); ?>'>"+
    		"</li>";
    		$(".img-list").append(html);
	    }
	    
    </script>
    <script>
    	$(function(){
    		$(".btn").click(function(){
    			/*
    				$('form:eq(1)')
    			*/
    			$.ajax({
    				url:"<?php echo U('handleEdit',array('id'=>$_GET['id']));?>",
    				data:$('form:eq(1)').serialize(),
    				type:'POST',
    				dataType:'json',
    				success:function(date){
    					if(!date.error){
    						alert(date.msg);
    						setTimeout(function(){
    							location.href = "<?php echo U('lists');?>";
    						},1000);
    					}else{
    						alert("无修改！");
    					};
    				}
    			});
    			
    			
    			return false;
    		});
    	});
    </script>
</body>
</html>