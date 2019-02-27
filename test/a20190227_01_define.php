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
    define('MY_CONST',3.456);
    $money = 66;
    echo MY_CONST ;
    echo'<br>';
    echo PHP_VERSION ;
    echo'<br>';
    ?>
    __DIR__:<?= __DIR__?>
    <br>
    __FILE__:<?= __FILE__?>
    <br>
    __LINE__:<?= __LINE__?>
    <br>
    money:<?= $money ?>

</body>
</html>