<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class ArticleController extends CommonController {
    
    function __initialize(){
        parent::_initialize();
        $this->db = D('Article');
    }
    
    //curd对应文章的增删改查
    public function lists(){ //文章列表页
      
        /*
         * count()  查询符合条件的条数
         */
        
//         //判断搜索是否有内容
//         if(!empty($_POST['key'])){
//             $where = array('title'=>array('like',"%".$_POST['key']."%"));
//         }
//         //使用field($field,true) 排除某个字段
//         $field = array('content');
        
//         $article = M('Article');
//         $count = $article->where($where)->count();
//         // 实例化分页类 传入总记录数和每页显示的记录数
//         $Page = new \Think\Page($count,1);
//         $show = $Page->show();// 分页显示输出
//         $list = $article->where($where)->order('articleid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
// //         $lists = $article->where($where)->field($field,true)->order('articleid desc')->select();
// //         echo $article->getLastSql()."====".$count;
        
        
        $article = D('Article');
        $data = $article->getData();
        $this->assign("lists",$data['data']);
        $this->assign("page",$data['page']);
        $a = 1504698969;
        $this->assign("a",$a);
        $this->display();
    }
    
    /*
     * save(array(字段=>值)) 更新字段
     * delete（） 
     */
    
    function delete($id){
        $Article = D('Article');
        $rs = $Article->delete($id);
        if($rs){
           $this->success('删除成功'); 
        }else{
            $this->error('删除失败');
        }
    }
    
    /*
     * select() 查询得到的是多维数组
     * find() 查询得到的是单数组
     */
    function edit($id=""){
        
        if(!empty($id)){
            $where = 'articleid='.$id.' AND is_del=1';
        }
        //对于方法中的参数。如果前台页面没有传值，那么就会报错，如果不想传，那么就给一个默认值
        /*
         * IS_POST  判断前台是否是post提交
         */
//         if(IS_POST){
//             echo 1;
// //            $data['content'] = $_POST['content'];
// //            $data['title'] = $_POST['title'];
// //            $data['desc'] = $_POST['desc'];
// //            $rs = M('Article')->where(array('articleid'=>$id))->save($data);
// //             if($rs){
// //                 $this->ajaxReturn(array('error'=>0,'msg'=>'修改成功'));
// //             }else{
// //                 $this->ajaxReturn(array('error'=>1,'msg'=>'修改失败'));
// //             }
//         }else{
            
//         }
        
        
        $article = M('Article');
        //获取原始数据  
//         $a = $article->where('articleid='.$id.' AND is_del=1')->select();
        $a = $article->where($where)->find();
        $this->assign('edita',$a);
        $this->display();
    }
}