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
    echo isset($aa)?'Yes':'No';
    
    echo '<br>';
    $aa = FALSE;
    echo isset($aa)?'Yes':'No';
    echo '<br>';

   ?>
--<?= true ?>--<br> <!--值為1-->
--<?= false ?>--<br><!--值為0-->
</body>
</html>