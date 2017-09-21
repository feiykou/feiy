<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model {
  
    public function getData(){
        //判断搜索是否有内容
        if(!empty($_POST['key'])){
            $where = array('title'=>array('like',"%".$_POST['key']."%"));
        }
        //使用field($field,true) 排除某个字段
        $field = array('content');
        
        $where['is_del'] = 1;
        
        $count = $this->where($where)->count();
        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page = new \Think\Page($count,3);
        $list = $this
            ->order('articleid desc')
            ->where($where)
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $show = $Page->show();// 分页显示输出
        return array('data'=>$list,'page'=>$show,'sql'=>$sql);
    }
    
    
    
    /*
     * save(array(字段=>值)) 更新字段
     * delete（）
     */
    function delete($id){
        /*
         * 在tp中，如果没有给delete限制条件，则不会执行
         */
        //改多个字段
//         $data = array('is_del'=>1,'title'=>'刚修改的');
        //         $rs = $Article->where('articleid='.$id)->save($data);
        //改一个字段或多个字段
        $rs = $this->where('articleid='.$id)->setfield('is_del',0);
        return $rs;
    }
    
}