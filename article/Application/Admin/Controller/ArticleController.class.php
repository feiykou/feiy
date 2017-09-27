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
    //edit处理模板，其他部分另外写一个方法
    function edit($id=""){
        
//         if(!empty($id)){
           
//         }
        //对于方法中的参数。如果前台页面没有传值，那么就会报错，如果不想传，那么就给一个默认值
        /*
         * IS_POST  判断前台是否是post提交
         */
//         if(IS_POST){
// //            $data['content'] = $_POST['content'];
// //            $data['title'] = $_POST['title'];
// //            $data['desc'] = $_POST['desc'];
//             //create()  创建数据对象，前提是提交的数据和数据库中字段的名称是一样的
//             //使用tp提供的create方法获得数据数组
//            $data = M('Article')->create();
           
//            $rs = M('Article')->where(array('articleid'=>$id))->save($data);
//             if($rs){
//                 $this->ajaxReturn(array('error'=>0,'msg'=>'修改成功'));
//             }else{
//                 $this->ajaxReturn(array('error'=>1,'data'=>$data,'id'=>$id,'msg'=>'修改失败'));
//             }
//         }
        
       
        $where = 'articleid='.$id;
        $article = M('Article');
        //获取原始数据  
//         $a = $article->where('articleid='.$id.' AND is_del=1')->select();
        $a = $article->where($where)->find();
        
        //获得已有的分类
        $lists = M('cate')->select();
        $lists = sortData($lists);
        $this->assign('edita',$a);
        $this->assign('lists',$lists);
        $this->display();
    }
    //edit的逻辑部分
    function handleEdit($id=""){
      if(IS_POST){
          $data = M("Article")->create();
          $data["content"] = $_POST["content"];
          $rs = M('Article')->where(array("articleid"=>$id))->save($data);
          if($rs){
              $this->ajaxReturn(array('error'=>0,'msg'=>'修改成功'));
          }else{
              $this->ajaxReturn(array('error'=>1,'data'=>$data,'id'=>$id,'msg'=>'修改失败'));
          }
      }else{
//           exit('非法访问');//阻止页面继续性
//           $this->redirect('lists','你好像迷路了','','3'); 
          $this->error("跳转失败",'Article/lists');
      }
    }
    
    public function add(){//添加文章模板页面
        //获得已有的分类
        $lists = M('cate')->select();
        $lists = sortData($lists);
        $this->lists = $lists;
        $this->display();
    }
    
    public function handleAdd(){//添加文章逻辑处理页
        $article = D('Article');
        $data = $article->create();
        $data['intime'] = time();
        $data['content'] = $_POST['content'];
        if($article->add($data)){
            $this->success("添加成功",U('lists'));
        }else{
            $this->success("删除成功");
        }
    }
    
    
    function detail($id){
//         $lists = M("article")->where(array(articleid=>$id))->select();
//         $this->assign("lists",$lists);
        $lists = M("article")->find($id);
        $this->lists = $lists;
        $this->display();
    }
    
    public function uploadFile(){
//         p($_FILES);
//         echo "<br>==========<br>";
//         p($_POST);
        //$_SERVER['DOCUMENT_ROOT']
        $upload = new \Think\Upload();// 实例化上传类    
        $upload->maxSize   =     3145728 ;// 设置附件上传大小    
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
        $upload->rootPath  =      './Public'; // 设置附件上传根目录    // 上传文件
        $upload->savePath  =      './Uploads/'; // 设置附件上传保存目录    // 上传文件     
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息        
            $this->error($upload->getError());    
        }else{// 上传成功        
            $this->ajaxReturn(array('error'=>0,'path'=>"./Public".$info['file']['savepath'].$info['file']['savename']));
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}