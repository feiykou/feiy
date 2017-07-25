<?php

class person{
    private $age = 18;
    protected $name = "feiy";
    public $sex =  "男de ";
    
    function __construct(){
//         echo 1;  sasd 
    } 
    
    function __destruct(){
//         echo "脚本结束！";
    }
    
    /**
     * __get设置访问权限
     * 
     */
    function __get($key){
//         $vars = get_object_vars(new self());
        $vars = get_class_vars(__CLASS__);
//         var_dump($vars); //array(3) { ["age"]=> int(18) ["name"]=> string(4) "feiy" ["sex"]=> string(6) "男de " } 
        $allow = array('sex');
        if(in_array($key,$allow)){
            return $this->$key;
        }else{
            return "你没有权限访问{$key}属性，{$key}是保密的！";
        }
//         if($key=='sex'){
//             return $this->$key;
//         }else{
//             exit('你没有权限访问！');
//         }
        
    }
    
    function __set($key,$val){
        echo "外部修改私有或者受保护的属性时候自动触发__set<br>";
        return $this->$key = $val;
    }
}

$person = new person();
echo $person->name;
// $person->sex = "看身份证";
// echo $person->sex;
// echo $person->name = "1";
/*
 * 魔术方法：
 *  __construct
 *  __destruct
 *  __get($key){
 *      return $this->$key;
 *  }
 *  __set($key,$val){
 *      return $this->$key = $val;
 *  }
 *  
 *  __toString(){
 *      return 字符串;
 *      注意：1、必须使用return关键字返回
 *      2、返回的结果必须是字符串类型的数据
 *  }
 * 
 */
// class person{
//     public $name = 'feiy';
//     private $age = 18;
//     protected $sex = '男';
    
    
//     function __construct(){
//         echo "构造函数===>";
//     }
    
//     function __destruct(){
//         echo '结束了！';
//     }
    
//     function __get($key){
//         echo "获取私有或者受保护的属性或方法===>";
//         return $this->$key;
//     }
    
//     function __set($key,$val){
//         echo "获取私有或者受保护的属性或方法===>";
//         return $this->$key = $val;
//     }
    
//     function __toString(){
//         return '直接输出对象是不合法的';
//     }
// }

// $person = new person();
// echo $person->age."===>";
// echo $person->sex."===>";
// echo $person->sex = '女==>';
