<?php
    header("content-type:text/html;charset=utf8");
    
    //用户名 ：user  密码：pwd  金额：fee  结算单位：danwei   总计：sign
    
    //这是简易支付类
    class pay{
        
        //支付前的验证操作
        function check($para){
            
//             echo "<pre>";
//             var_dump($para);

            
//             //返回的是索引排序
// //             sort($para);
//             //ksort 按照键名排序
//             ksort($para);
            
//             //通过checkuser方法查询这个人是不是你的用户
            
//             echo "<pre>";
//             var_dump($para);
//             if($para["user"]=="feiy" && $para["pwd"]=="123456"){
//                 return true;
//             }
//             return false;

            if($this->checkuser($para['user'],$para['pwd'])){
                $arr = array($para['fee'],$para['danwei']);
                ksort($arr);
                //implode 将一个一维数组转化成字符串
                $str = implode($arr);
                $tmp = md5($str);
                if($tmp!=$para['sign']){
                    return false;
                }
            }else{
                return false;
            };
            return true;
        }
        
        private function checkuser($user,$pwd){
            $user = base64_decode($user);
            $mysqli = new mysqli("127.0.0.1","root","","test");
            $mysqli->set_charset('utf8');
            $sql = "select * from student where name='{$user}' and age='{$pwd}'";
            $rs = $mysqli->query($sql);
            
//             $arr = array();
//             while($row = $rs->fetch_assoc()){
//                 $arr[] = $row;
//             }
            if(mysqli_num_rows($rs)){
                return true;
            }else{
                echo "没有这个用户";
            }
            
            return false;
        }
        
        //执行支付的操作
        public function handle($para){
            if($this->check($para)){
                echo "支付了10块钱！";
            }else{
                echo "发生了错误，支付失败！";
            };
        }
    }
    
    $a = new pay();
    
    //$_GET传递过来的是一个数组
    $para = $_GET;//调用接口的这个人传过来的参数
    /*
     * array (size=5)
      'user' => string '6JCn5Y2B5LiA6YOO' (length=16)
      'pwd' => string '123456' (length=6)
      'fee' => string 'aaa' (length=3)
      'danwei' => string 'bbb' (length=3)
      'sign' => string '6547436690a26a399603a7096e876a2d' (length=32)
//      */
//     echo "<pre>";
//     var_dump($para);
    
    $a->handle($para);
    
    //开发文档做的事情，就是告诉算法，根据算法组合参数通过他的验证
//     echo 1;
//     echo base64_encode(1); //MQ==

