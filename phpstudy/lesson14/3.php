<?php

// M('stu').where('id=6').delete();

class db{
    
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
    
    function where($where=''){
        if(empty($where)){
           die("where的条件不能为空！"); 
        }
        
        if(is_array($where)){
            foreach ($where as $k=>$v){
                $this->option[$k] = $v;
            }
        }else{
            $this->option=$where;
        }
        
        echo '<pre>';
        var_dump($this->option);
        
        return $this;
    }
    
    function delete(){
        $string = '';
        $sql = "delete from {$this->table} where {$this->option}";
        $result = $this->conn->query($sql);
        return $result;
    }
    
}

$db = new db("mysql","localhost","root","","3306","stu");
$result = $db->M('stu')->where(array('id'=>3,'name'=>'张飞'))->delete();


if($result){
    echo "操作成功";
}else{
    echo "操作失败";
}






















