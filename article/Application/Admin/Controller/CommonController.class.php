<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Auth;
class CommonController extends Controller {
    //执行任何一个方法首先执行该初始化方法_initialize ==contructor
    public function _initialize(){
        if(!isset($_SESSION['userid'])){
            $this->redirect('Access/login');
        }else{
            $user = M("user")->where(array("userid"=>$_SESSION['userid']))->select();
            $this->feiy_user = $user[0];
        }
        
        
        
        if($_SESSION['name']=='admin'){
            return true;
        }
        
        $auth = new Auth();
        if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,$_SESSION['userid'], $type = 1, $mode = 'url', $relation = 'or')){
            $this->error("没有权限",U('Access/login'));
        }
        
    }
    
    
    
    
}