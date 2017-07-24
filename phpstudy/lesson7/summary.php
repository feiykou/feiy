<?php
/**
 * 
 * 本节重点知识：
 * 一、数组
 *  1、数组的增删
 *    1) 数组的添加
 *      $arr = array();
 *      $arr[] = 值;
 *    2) 数组的删除
 *      unset($arr[key]);
 *  
 *  2、数组中的查找
 *    1) 查找成功返回key键，否则返回false
 *      mixed array_search ( mixed $needle , array $haystack [, bool $strict = false ] ) 在数组中搜索给定的值，如果成功则返回相应的键名 ,否则返回false
 *    2) 检查数组中是否存在某个值
 *      bool in_array ( mixed $needle , array $haystack [, bool $strict = FALSE ] )
 *      注：如果$needle时字符串，则区分大小写
 *      
 *   3、count(数组)：获取数组长度
 *   
 *   4、foreach()
 *   
 *   5、字符串和数组互转
 *    1) str_split(字符串) 分割字符串转为数组
 *    2) implode ( string $glue , array $pieces ) 将一个一维数组的值转化为字符串
 *    3) explode ( string $delimiter , string $string [, int $limit ] ) 使用一个字符串分割另一个字符串  返回的是数组
 *   
 *   6、过滤数组元素
 *    1) array_filter ( array $array [, callable $callback [, int $flag = 0 ]] ) 过滤数组中的空字符（'',null,false,）
 *    2) array_unique(数组名) 移除数组中重复的值
 *    
 *   7、排序
 *    1) krsort(数组名) 对数组按照键名逆向排序
 *    2) sort() 对数组排序
 *    2) array_reverse ( array $array [, bool $preserve_keys = false ] ) 返回一个单元顺序相反的数组
 *    
 * 
 * 二、字符串
 *  1、截取字符串，查找字符在字符串中的位置
 *     1) 查找指定字符在字符串中的最后一次出现  针对的是字符  
 *      string strrchr ( string $haystack , mixed $needle )
 *      注:$needle是字符
 *     2) 返回字符串的子串
 *      string substr ( string $string , int $start [, int $length ] )
 *      注：substr经常和strrpos()一起使用
 *  2、查找字符串出现的位置
 *     1) 查找字符串首次出现的位置
 *      mixed strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
 *     2) 指定字符串在目标字符串中最后一次出现的位置
 *      int strrpos ( string $haystack , string $needle [, int $offset = 0 ] )
 *  
 *  
 *  三、文件操作
 *   1、文件或目录的常见操作
 *      1)rename  重命名
 *      2)rmdir   删除目录
 *      3)mkdir   创建目录
 *      4)scandir 扫描文件
 *   2、$_FILES
 *      获取上传文件的相关信息
 *   3、file_exists 检查文件或目录是否存在
 *      bool file_exists ( string $filename )
 *   4、move_uploaded_file 将上传的文件移动到新位置
 *      bool move_uploaded_file ( string $filename , string $destination )
 *  
 *  
 *  
 *  四、文件上传之前的准备工作
 *   1、文件上传的时候用$_FILES接收文件信息
 *   文件上传需要指定编码方式：enctype="multipart/form-data"
 *   2、html页面必须指定enctype="multipart/form-data"属性
 *   3、上传的流程：源文件-》临时目录(tmp--判断文件筛选，没问题放到目标位置)-》目标位置
 *   4、确保php.ini中file_uploads = on  上传总闸，确保是on,否则无法上传
 *   5、upload_max_filesize = 2M;  允许上传的文件大小（最大值），如果更改值，则改完之后，重新启动所有服务     post_max_size = 8M  能够上传的东西一共8M  改完之后重启一下服务器（因为修改了php配置，修改内存大小） 
 *   6、临时文件在脚本执行完之后即被删除 
 *   
 *   
 *   五、其他
 *    1、uniqid()  生成一个唯一ID
 *    2、md5()     计算字符串的 MD5 散列值
 *    3、time()    返回当前的 Unix 时间戳（返回的是秒数）
 *    4、date(string $format [, int $timestamp ])    格式化一个本地时间／日期
 *  
 *  
 *  
 *  感悟：
 *      1、操作值的时候，能不用循环的尽量不要用，这种方法性能不高，是没有思路可言的，尽量使用函数或其他方式解决
 *      
 *  小知识点：
 *      1、mixed(混合)：伪类型  mixed $needle 指的是$needle可以时任何数据
 */