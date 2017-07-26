<?php
/**
 * 获取根目录的绝对路径
 */
if(!defined('root')){
    define('root', str_replace('\\', '/', dirname(__FILE__)));
}

/**
 * __get设置访问权限
 *
 */
function __get($key){
    $allow = array('sex');
    if(in_array($key,$allow)){
        return $this->$key;
    }else{
        return "你没有权限访问{$key}属性，{$key}是保密的！";
    }
}

/**
 * 构造一个单例模式
 */
class car{
    static $conn = null;
    final private function __construct(){
        
    }

    static public function getConn(){
        if(is_null(self::$conn)){
            self::$conn = new self();
        }
        return self::$conn;
    }
}
