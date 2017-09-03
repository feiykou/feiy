<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class ArticleController extends CommonController {
    //curd对应文章的增删改查
    public function lists(){ //文章列表页
        
        /*
         * select(paras)
         * paras=false 则返回的数据库sql语句
         * paras不写则返回的是数据库查询结果
         * 
         * order  排序
         * field  查询的字段
         * limit(num)  限制数据条数
         * 
         * where(paras)
         * paras:可以是数组，也可以是单个sql语句，提倡使用数组，因为数组安全性更高，而且不容易出错
         * 
         * $数据对象->getLastSql() 获得该数据对象执行的最后一条sql
         * 
         * select()在最后，返回的是结果
         * 中间的所有方法返回的是当前对象，无顺序
         */
        //使用field方法传入要查询的字段
//         $field = array(
//             'articleid',
//             'cateid',
//             'title',
//             'des',
//             'hits',
//             'intime',
//         );

        
       
        
        
        //判断搜索是否有内容
        if(!empty($_POST['key'])){
            $where = array('title'=>array('like',"%".$_POST['key']."%"));
        }
        //使用field($field,true) 排除某个字段
        $field = array('content');
        
//         $where = 'title like "%'.$_POST['key'].'%"';
        //第一种方式查出新闻
//         $lists = M('Article')->limit(2)->where($where)->field($field,true)->order('articleid desc')->select();
        
        
        //第二种方式
        $article = M('Article');
        $lists = $article->limit(2)->where($where)->field($field,true)->order('articleid desc')->select();
        //$数据对象->getLastSql() 获得该数据对象执行的最后一条sql
//         echo $article->getLastSql();
        
        
        $this->assign("lists",$lists);
        
        /*
         * display(paras)//调用哪个模板就调用哪个参数
         * eg:paras='Access:login'  控制器名:方法名
         * 不传参数，则会找当前控制器文件下面的与方法同名的文件
         */
        //首先要创建控制器下面的对应文件
        $this->display();
    }
}