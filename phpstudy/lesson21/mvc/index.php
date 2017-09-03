<?php
    header("content-type:text/html;charset=utf-8");
    echo "<pre>";
    
    $title = "我是标题";
    $content = "我是网站内容1";
    $content2 = "我是网站内容2";
    $content3 = "我是网站内容3";

    
    
//     $smarty = new smarty();
//     $smarty->view = "./view/";
//     $smarty->cache = './cache/';
    
   
//     $smarty->assign('title',$title);
//     $smarty->assign('content',$content);
//     $smarty->assign('content2',$content2);
//     $smarty->assign('content3',$content3);

    
//     $smarty->display("index.html");
    
    //通过传递不同的参数，就可以访问不同的页面
    //Home一般值得是前台，admin指的是后台
    $c = isset($_GET['c']) ? $_GET['c'] : 'Index';
    $a = isset($_GET['a']) ? $_GET['a'] : 'index';
    

    $cobj = new $c();
    $cobj->$a();
    
    
    
    function __autoload($class){
        $file = './controller/'.$class.'.php';
        if(!file_exists($file)){
            die("没有这个文件");
        }else{
            include $file;
        };
    }
?>
