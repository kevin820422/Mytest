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
 //date_default_timezone_set('Asia/Taipei');


    echo date("Y-m-d H:i:s");
    echo '<br>';
    echo date("Y-m-d H:i:s", time() - 30 * 24 * 60 * 60);
    echo '<br>';
    echo date("H");
    echo '<br>';
    echo date_default_timezone_get() . ' => ' . date('e') . ' => ' . date('T');


    ?>
</body>

</html> 