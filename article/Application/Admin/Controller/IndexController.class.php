<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class IndexController extends CommonController {
    
    //后台首页
    public function index(){
//         echo "<pre>";
//         print_r($_SERVER);
        //模板页面
        $this->display();
    }
      
    public function slist(){
        //模板页面
        $this->display();
    }
  
  
}