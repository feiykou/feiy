<?php

/**
 * str_pad(要填充的字符串,填充长度,[填充的字符串],[填充方式]);
 */

$a = "abc";
$newa = str_pad($a,9,"0",STR_PAD_BOTH);
echo $newa; //000abc000