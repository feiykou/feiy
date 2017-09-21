<?php

namespace Admin\controller;
use Admin\Controller\CommonController;

class CateController extends CommonController{
   
    public function lists(){
        //这种方式是新手1+N模式，不提倡使用
//         $lists = M('cate')->select();
// //         $this->lists = $lists;
//         foreach ($lists as $k=>$v){
//             if($v['pid']!=0){
//                 $lists[$k]['pname'] = M('cate')->where(array('cateid'=>$v['pid']))->getField('name');
//             }
//         }
        //SELECT t1.*,t2.name as pname FROM `feiy_cate` as t1 left join feiy_cate as t2 on t1.pid=t2.cateid;
        /*
         * 第一种方式：
         * 编写原生的sql，调用query方法获取数据
         */
//         $sql = 'SELECT t1.*,t2.name as pname FROM `feiy_cate` as t1 left join feiy_cate as t2 on t1.pid=t2.cateid';
//         $rs = M('')->query($sql); //可以实例化空的数据对象

        /*
         * 第二种方式：
         *  使用数据对象的join连贯操作
         *  
         *  alias 用于设置当前数据表的别名
         *  field 主要目的是标识要返回或者操作的字段，可以用于查询和写入操作
         *  inner 全连接，左右表都符合
         *  左表的数据都返回，使用坐连接
         */
        $lists = M('cate')
        ->alias('t1') //给数据表起别名
        ->field(array("t1.*",'t2.name as pname'))//约定要获取的字段
        ->join('feiy_cate as t2 on t1.pid = t2.cateid',"left")//采用坐连接的方式查询
        ->select();
        $lists = sortData($lists);
        $this->assign('lists',$lists); //读取类里面的属性
        $this->display();
    }
    
    public function add(){//添加文章模板页面
        
        //获得已有的分类
        $lists = M('cate')->select();
        $lists = sortData($lists);
        $this->lists = $lists;
        $this->time = time();
        $this->display();
    }
    public function handleAdd(){//添加文章逻辑处理页面
        
        //判断表单是否填写
        if(in_array('',$_POST)){
            $this->error('存在没有填写的输入框！');
        }
        $name = $_POST['name'];
        
        //判断是否存在同名
        $exists= M('cate')->where(array('name'=>$name))->find();
        $exists && $this->error('存在同名分类！');
        
        $data = array(
            'name'=>$_POST['name'],
            'pid'=>$_POST['pid']
        );
        
        $rs = M('cate')->add($data);
        if($rs){
            $this->success('数据写入成功！',U('lists'));
        }else{
            $this->error('数据写入失败！');
        }
    }
    public function delete(){//删除分类
    
    }
    public function edit(){//修改分类
    
    }
    
    
}