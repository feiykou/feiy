<?php
//没有关键字修饰的都是public
//面向对象的编程原则：开放最小的权限，进行最大化的封装
//封装的目的就是保证内部代码的功能性
class mysql{
    private function add(){ //添加数据
        echo "可以添加数据了";
    }
    
    private function delete(){ //删除数据
        echo "可以删除数据了";
    }
    
    private function undate(){ //修改数据
        echo "可以修改数据了";
    }
    
    private function select(){ //查询数据
        echo "可以查询数据了";
    }
    
    function query($user,$action){
        //假设管理员的账户是admin
        if($user=="admin"){
            echo "你可以进行所有操作";
            $this->$action();
        }else{
            echo "你没有权限操作";
        }
    }
};

$mysql = new mysql();
// $mysql->delete();
$mysql->query("admin","delete");








