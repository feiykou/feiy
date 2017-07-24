<?php

/**
 * 通过函数的方式使$a == $b;
 */

$a = '123456';
$b = 'abcdef';

$lena = strlen($a);
$a1 = substr($a,0,$lena);
$a = str_replace($a, $b, $a);
echo $a;

