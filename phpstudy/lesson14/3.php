<?php

// M('stu').where('id=6').delete();

//数据库类
interface base{
    function add();
    function save();
    function find();
}

class db implements base{
    
    public $conn = null;
    public $table = '';
    public $option = array();
    
    //连接数据库
    function __construct($type,$host,$user,$psd,$port,$dbname){
        $dsn = "{$type}:host={$host};dbname={$dbname}";
        try {
            $this->conn = new PDO($dsn,$user,$psd);
            $this->conn->query("set names utf8");
        } catch (Exception $e) {
            die("连接失败！");
        }
    }
    
    function M($table,$perfix=''){
        $this->table = $table.$perfix;
        return $this;
    }
    
    //条件解析
    function where($where=''){
        if(empty($where)){
           die("where的条件不能为空！"); 
        }
        
        if(is_array($where)){
            foreach ($where as $k=>$v){
                //设置option['where']的原因是：在后面对数组和字符串进行统一判断
                $this->option['where'][$k] = $v;
            }
        }else{
            $this->option['where']=$where;
        }
        
        echo '<pre>';
        var_dump($this->option);
        
        return $this;
    }
    //删除
    function delete(){
        $string = '';
        if(isset($this->option['where'])){
            if(is_array($this->option['where'])){
                foreach ($this->option['where'] as $k => $v){
                    $string.= ' '.$k.'='.$v.' and';
                }
            }else{
                $string = $this->option['where'];
            }
        }
        
        $sql = "delete from {$this->table} where{$string}";
        $sql = rtrim($sql,"and");
        echo $sql;
        $result = $this->conn->query($sql);
        return $result;
    }
    
    function add(){}
    function save(){}
    function find(){}
}

$db = new db("mysql","localhost","root","","3306","stu");
$result = $db->M('stu')->where(array('id'=>5,'name'=>'"王五"'))->delete();


if($result){
    echo "操作成功";
}else{
    echo "操作失败";
}






















