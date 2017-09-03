<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class ArticleController extends CommonController {
    //curd对应文章的增删改查
    public function lists(){ //文章列表页
      
        
        /*
         * count()  查询符合条件的条数
         */
        
        //判断搜索是否有内容
        if(!empty($_POST['key'])){
            $where = array('title'=>array('like',"%".$_POST['key']."%"));
        }
        //使用field($field,true) 排除某个字段
        $field = array('content');
        
        $article = M('Article');
        $count = $article->where($where)->count();
        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page = new \Think\Page($count,1);
        $show = $Page->show();// 分页显示输出
        $list = $article->where($where)->order('articleid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
//         $lists = $article->where($where)->field($field,true)->order('articleid desc')->select();
        echo $article->getLastSql()."====".$count;
        
        
        $this->assign("lists",$list);
        $this->assign("page",$show);
        $this->display();
    }
}