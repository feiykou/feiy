<?php
    
    class smarty{
        
        public $vars = array(); //用来存储给html分配的变量
        public $view = ""; //模板文件存放的位置
        public $cache = "";
        
        
        
        public function assign($k,$v){
            $this->vars[$k]=$v;
        }
        
        public function display($file){
            //第一步:引入模板文件，不存在die出错信息
            $filepath = $this->view.$file;
            //file_exists(文件路径)：判断文件是否存在
            if(!file_exists($filepath)){
                die("模板文件不存在！");
            }
            
            //有没有必要每次都去获取模板内容
            $cache = $this->cache.$file.'.php';
            //filemtime(文件路径) 文件修改时间
            if(!file_exists($cache) || filemtime($filepath)> filemtime($cache)){
                /*
                 * 1、缓存文件不存在的时候，必须获取模板内容然后编译输出
                 * 2、缓存文件创建时间小于模板文件修改时间
                 * 
                 * */
                //存在文件，使用函数获取页面内容
                //file_get_contents(文件路径)：获取文件内容
                $content = file_get_contents($filepath);
                
                //把内容中的占位符替换成php
                //             {$title}-><?php echo $this-vars['title']
                	
                $preg='/\{\s*\$([a-zA-Z_]\w+)\s*\}/';
                //${1}匹配的是第一个括号里面的值
                $replace = '<?php echo $this->vars["${1}"]?>';
                $newcontent = preg_replace($preg,$replace,$content);
                	
                file_put_contents($cache,$newcontent);
                echo 1;
            }
            
			include $cache;
        }
    }

?>