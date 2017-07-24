<?php
/*
 * __get()方法，外部获取类私有方法的中间方法
 */

class a{
    private $aa = 1;
    protected $bb = 2;
    public $cc = 3;
    
    //访问一个受保护或者私有的方法的时候自动触发
    function __get($key){
        return $key;
    }
}

$a = new a();
echo $a->aa;







