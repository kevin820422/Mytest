<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $name='peter';
    $str="25
    151
    456
    dfg";

    echo "Hello, $name<br>"; //雙引號可帶入變數
    echo "Hello, {$name}123<br>"; 
    echo 'Hello, $ name<br>'; //單引號無法帶入變數,只顯示純文字
    ?>
</body>
</html>