<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <pre>
<?php

$ar3 = array(
    'name' => 'Bill',
    'age' => 20,
    'gender' => 'male',
);

$ar4 = $ar3;

$ar5 = &$ar4; // 以位址設定,參照

$ar4['name'] = 'David';

print_r($ar3);
print_r($ar4);
print_r($ar5);

$a = 10;
$b = &$a;
$b = 100;

echo $a;


// 接收位址
function func(&$a, &$b)
{ }

function func2($a, $b)
{ }

// func2(&$a, &$b); // 傳址呼叫 5.4 之後功能取消

?>
</pre>
</body>

</html> 