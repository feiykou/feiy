<?php
$arrow = array('.jpg','.png','.jpg');
if(in_array($_POST['type'], $arrow)){
   echo "格式正确";
}else{
   echo '格式不存在';  
};
