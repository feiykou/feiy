<?php

    class page{
        private $total; //总记录数
        private $listnum; //每页条数
        private $url; //地址栏参数
        private $page; //当前页
        private $pageList; //总页数
        private $limit; //限制条数
        private $html = ''; //分页要输出的html
        
        function __construct($total,$num){
            $this->total = $total;
            $this->listnum = $num;
            $this-> url = $this->getUrl();
            $this->page = !empty($_GET['page'])?$_GET['page']:1;
            $this->pageList = ceil($total/$num);
            $this->limit = $this->setLimit();
        }
        
        function show(){
//             echo $this->setLimit();
            $this->first();
            $this->prePage();
            $this->nextPage();
            $this->last();
            return $this->html;
        }
        private function getUrl(){
            $url = $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':'?');
            //如果地址栏有page参数，那么删掉它
            $arr = parse_url($url);
            if(isset($arr['query'])){ //如果存在查询参数，那么检查有没有page
                parse_str($arr['query'],$queryArr);
                if(isset($queryArr['page'])){
                    unset($queryArr['page']);
                    $url = $arr['path'].'?'.http_build_query($queryArr);
                }
            }
            echo $url;
            return $url;
        }
        
        private function setLimit(){
            return $this->limit = "limit ".($this->page-1)*$this->listnum.','.$this->listnum;
        }
        
        private function nextPage(){
            if($this->page<$this->pageList){
                $this->html.="<a href='{$this->url}&page=".($this->page+1)."'>下一页</a>";
            }else{
                $this->html.="<span>下一页</span>";
            }
        }
        
        private function prePage(){
            if($this->page>1){
                $this->html.="<a href='{$this->url}&page=".($this->page-1)."'>上一页</a>";
            }else{
                $this->html.="<span>上一页</span>";
            }
        }
        
        private function first(){ //首页
            if($this->page!=$this->total){
                $this->html.="<a href='{$this->url}&page={$this->total}'>首页</a>";
            }else{
                $this->html.="<span>首页</span>";
            }
        }
        
        private function last(){ //末页
            if($this->page!=1){
                $this->html.="<a href='{$this->url}&page=1'>首页</a>";
            }else{
                $this->html.="<span>首页</span>";
            } 
        }
        
        function __get($key){
            if($key == 'limit'){
                return $this->$key;
            }else{
                return null;
            }
        }
    }
//     echo '<pre>';
//     var_dump($queryArr);
    /*
     * index.php  首页
     * index.php?page=2   在地址栏里加上?page = 请求的页码
     * 
     * index.php?type=xiangbao  首页
     * index.php?type=xiangbao&page=2
     * index.php?type=xiangbao&page=2?page=3 问题：不能一直加
     * 
     */

