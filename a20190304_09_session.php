<?php
session_start();


if (!isset($_SESSION['my'])) {
    $_SESSION['my'] = 1;
} else {
    //超過10歸零
    if($_SESSION['my']<10){
        $_SESSION['my']++;
    }else{
        // unset($_SESSION['my']);
        $_SESSION['my']=1;
    };
    
}

?>
<!doctype html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

    echo $_SESSION['my'];
    

    ?>

</body>

</html> 