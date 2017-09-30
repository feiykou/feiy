<?php

//在common文件中的function.php文件中，可以定义公共方法，否则无法自动加载
    function p($arr){
        echo "<pre>";
        print_r($arr);
    };
    
    function sortData($arr,$pid=0,$level=0,$html="----"){
        $newArr = array();
        foreach ($arr as $k=>$v){
            if($v['pid']==$pid){
                $v['level'] = $level;
                $v['html'] = $html;
                $newArr[] = $v;
                //array_merge()合并一个或多个数组
//                 $newArr[] = array_merge($v,sortData($arr,$v['cateid'],$v['level']));
                $newArr = array_merge($newArr,sortData($arr,$v['cateid'],$v['level']+1));
            }
        }
        return $newArr;
    };
    
    /*
     * id转换成中文分类
     * 
     * getField()  读取字段值
     * getField(字段,true); 获取字段数组
     * getField('字段1,字段2');返回的是key,value形式字段1:字段2
     * 
     */
    function getCateName($id){
        return M('Cate')->where(array('cateid'=>$id))->getField('name');
    }
    
    
    /*
     * 角色转换成中文
     * 问题：当角色设置禁用时，用户这边角色没有改变
     */
    function getGroupName($id){
        $group_id = M("group_access")->where(array("uid"=>$id))->getField('group_id',true);
        if($group_id){
            $group_name = M("auth_group")->where(array("id"=>array("in",$group_id)))->getField("title",true);
        }else{
            return "无角色";
        }
        return implode(",",$group_name);
    }
    
    
?>