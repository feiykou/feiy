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
       
//         //1、首先验证验证码
//         $verify = new \Think\Verify();    
//         if(!$verify->check($_POST['code'])){
// //             echo "验证码错误！";
//             $this->error("验证码错误",'',1);
//         };
        
//         //2、验证用户
//         $where = array(
//             'username'=>$POST['username'],
//             'password'=>md5($_POST['password'])
//         );
//         $user = M('feiy_user')->where($where)->find();
//         if($user){
//             $this->success("登录成功");
//         }else{
//             $this->error("用户名或密码错误！");
//         }

        //1、首先验证验证码
//         $verify = new \Think\Verify();
//         if(!$verify->check($_POST['code'])){
//             //             echo "验证码错误！";
//             $this->ajaxReturn(array("error"=>1,"msg"=>"验证码错误"));
//         };
        
//         //2、验证用户
//         $where = array(
//             'username'=>$POST['username'],
//             'password'=>md5($_POST['password'])
//         );
        
//         die;
//         $user = M('feiy_user')->where($where)->find();
//         if($user){
//             $this->ajaxReturn(array("error"=>0,"msg"=>"验证成功"));
//         }else{
//             $this->ajaxReturn(array("error"=>1,"msg"=>"用户或密码错误"));
//         }
        
    }

  
  
}