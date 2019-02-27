<?php

// echo $_GET['a'] + $_GET['b'];
$a=isset($_GET['a'])? intval($_GET['a']) : 0;
$b=isset($_GET['b'])? intval($_GET['b']) : 0;

echo $a+$b;
?>
<!-- 網址列輸入?a=49&b=11 可賦值給a,b -->