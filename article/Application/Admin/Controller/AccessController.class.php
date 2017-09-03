<?php
namespace Admin\Controller;
use Think\Controller;
class AccessController extends Controller {
    //登录模板页面
    public function login(){
        echo md5(123456);
        //模板页面
        $this->display();
    }
    
    public function code(){
        $config = array(
            'length'=>2
        );
       $Verify = new \Think\Verify($config);
       $Verify->entry();
    }
    
    public function handle(){//验证登录
       $user = D('User'); //实例化User对象
       //根据表单提交的POST数据创建数据对象
       $data = $user->create();
       if(!$data){
           $this->ajaxReturn(array('error'=>1,'msg'=>$user->getError()));
       }else{
           $data['password'] = md5($data['password']);
           if($login = $user->where($data)->find()){
               $_SESSION['userid'] = $login['userid'];
               session('name',$login['username']);
               $this->ajaxReturn(array('error'=>0));
           }else{
               $this->ajaxReturn(array('error'=>1,'msg'=>"用户名或密码错误"));
           };
          
       };
    }
    
    function logout(){
        $_SESSION['userid'] = null;
        $this->success("注销成功！");
    }

  
  
}