<?php

    
//     $user = urlencode("萧十一郎");
$user = base64_encode("萧十一郎");
    $arr = array('aaa','bbb');
    //按照键名排序
    ksort($arr);
    //转换成字符串才能加密
    $str= implode($arr);
    $sign = md5($str);

    //异步发请求,以下两种方式
//     file_get_contents($filename);
//     curl_init();
    
?>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
	</head>
	<body>
		<a href="pay.class.php?user=<?php echo $user; ?>&pwd=123456&fee=aaa&danwei=bbb&sign=<?php echo $sign; ?>">点我</a>
	</body>
</html>
