<?php
/**
 * 文件的处理
 */


/**
 * 1、允许的类型为：.jpg，.png，.docx，.xsl
 * 2、文件大小限制为10M
 * 3、文件命名格式为文件类型/工作者/年月日/文件名，防止重命名冲突
 * 
 * 
 * 文件上传之前的准备工作：
 * 1、文件上传的时候用$_FILES接收文件信息
 * 文件上传需要指定编码方式：enctype="multipart/form-data"
 * 2、html页面必须指定enctype="multipart/form-data"属性
 * 3、上传的流程：源文件-》临时目录(tmp--判断文件筛选，没问题放到目标位置)-》目标位置
 * 4、确保php.ini中file_uploads = on  上传总闸，确保是on,否则无法上传
 * 5、upload_max_filesize = 2M;  允许上传的文件大小（最大值），如果更改值，则改完之后，重新启动所有服务     post_max_size = 8M  能够上传的东西一共8M  改完之后重启一下服务器（因为修改了php配置，修改内存大小） 
 * 6、临时文件在脚本执行完之后即被删除 
 * 
 */

/**
 * 文件或目录的常见操作：
 * 1、rename 重命名
 * 2、rmdir  删除目录
 * 3、mkdir  创建目录
 * 4、scandir 扫描文件
 * 
 * move_uploaded_file 把文件移到指定位置（主要用于http post）
 * 
 */

header("content-type:text/html;charset=utf-8");
//time()  获取当前时间的秒数   md5()计算字符串的 MD5 散列值
// echo md5(time());
// die();
/**
 * Array
    (
        [file] => Array
            (
                [name] => 2016.11工资条.xlsx
                [type] => application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
                [tmp_name] => D:\SoftDownload\wamp\tmp\php325F.tmp
                [error] => 0
                [size] => 15001
            )
    
    )
 */
// sleep(10); //延迟10s
echo "<pre>";
//如果文件过大，获取是空   
print_r($_FILES);//脚本执行完，删除tmp中的中转文件
$file = $_FILES['file'];
$arrow = array(".jpg",".png",".gif",".docx",".xlsx",".wmv",".swf");
/**
 * 1、取得上传文件的后缀 strrpos()指定字符串在目标字符串中最后一次出现的位置，针对的是位置
 */
// $suffix = substr($file['name'],strrpos($file['name'],".")); 
//strrchr — 查找指定字符在字符串中的最后一次出现  针对的是字符
$suffix = strrchr($file['name'], ".");
// echo $suffix;


/**
 * 2、判断是不是允许上传的后缀
 * in_array()
 */
if(!in_array($suffix,$arrow)){
    echo alert("不是允许上传的文件类型");
    exit();
};


/**
 * 3、判断文件是不是符合大小限制
 */
if($file['size']>=1024*1024*10){
    echo alert("文件大小超出限制");
    exit();
}

/**
 * 4、文件命名格式为文件类型/工作者/年月日/文件名，防止重命名冲突
 */
if($suffix==".jpg" || $suffix==".png" || $suffix==".gif"){
    $type = "image";
}elseif($suffix==".docx" || $suffix==".xlsx"){
    $type = "text";
}else{
    $type = "voice";
};


//判断文件夹是否存在，没有则创建对应的目录
$dir = $type."/xiaoming/".date('ymd')."/";
//创建对应的目录    mkdir(目录,权限,是否级联创建)创建目录
//file_exists  检测文件或目录是否存在
if(!file_exists($dir)){
    mkdir($dir,0777,true);
};
//uniqid()取得唯一的id
$new = $dir.uniqid().$suffix;
//move_uploaded_file(上传的文件,指定目录到文件名)  移动文件到指定位置，成功返回true，否则返回false
$result = move_uploaded_file($file['tmp_name'],$new);
if($result){
    echo alert("文件上传成功！");
    exit;
}else{
    echo alert("文件上传失败！");
    exit;
}


















//弹窗
function alert($msg,$url=""){
  
    if($url==""){
        
        $str=<<<str
            <script>
               alert('{$msg}'); 
               history.go(-1);
            </script>
str;
    }else{
        $str=<<<str
            <script>
               alert('{$msg}'); 
               window.location = '{$url}';
            </script>
str;
    };
        
    return $str;
};


















