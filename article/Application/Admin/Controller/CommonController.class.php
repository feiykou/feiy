<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    //执行任何一个方法首先执行该初始化方法_initialize ==contructor
    public function _initialize(){
        if(!isset($_SESSION['userid'])){
            $this->redirect('Access/login');
        }
    }
}