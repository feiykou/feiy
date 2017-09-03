<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="/feiystudy/article/Public/bootstrap/css/bootstrap.css">

<style>
	.modal{display:block;}
</style>
</head>
<body>

	
	<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="exampleModalLabel">后台登录页面</h4>
	      </div>
	       <form>
	      <div class="modal-body">
	          <div class="form-group">
	            <label for="recipient-name" class="control-label">用户名:</label>
	            <input type="text" name="username" class="form-control" id="recipient-name" placeholder="请输入用户名">
	          </div>
	          <div class="form-group">
	            <label for="message-text" class="control-label">密码:</label>
	            <input type="password" name="password" class="form-control" id="recipient-name" placeholder="请输入密码">
	          </div> 
	          <div class="form-group">
	            <label for="message-text" class="control-label">验证码:</label>
	            <input type="text" name="code" class="form-control" id="recipient-name" placeholder="请输入验证码">
	          </div>
	          <div class="form-group">
	          	<!-- 
	          		<?php echo U('方法名',"参数","伪静态后缀");?>  访问当前控制器下的方法
	          	-->
	            	<img src="<?php echo U('code','','');?>" onclick="this.src=this.src">
	          </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-lg btn-block">登录</button>
	      </div>
	    
	      </form>
	    </div>
	  </div>
	</div>
<?php echo U('handle');?>
     <script src="/feiystudy/article/Public/bootstrap/js/jquery-1.12.4.min.js"></script>
     <script src="/feiystudy/article/Public/bootstrap/js/bootstrap.min.js"></script>
   	 <script>
   	 	$(function(){
   	 		$("button").on("click",function(){
   	 			$.ajax({
   	 				url:"<?php echo U('handle');?>",
   	 				//如果想要把表单中的值序列到字符串中，就必须使用name
   	 				data:$("form").serialize(),
   	 				type:"POST",
   	 				success:function(data){
   	 					if(data.error==1){
   	 						html = "<div class='alert alert-danger' role='alert'>";
   	 						html+="<strong>"+data.msg+"</strong></div>";
   	 						$(".form-group:eq(0)").before(html);
   	 						setTimeout(function(){
   	 							$(".alert").remove();
   	 						},1000);
   	 					}else{
   	 						location.href="<?php echo U('Index/index');?>";
   	 					}
   	 				}
   	 			});
   	 		});
   	 	});
   	 </script>
</body>
</html>