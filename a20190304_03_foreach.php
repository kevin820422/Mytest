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

    $ar3= array(
        'name' => 'Bill',
        'age' => 20,
        'gender' => 'male',
        'race' => 'Asian',
    );
    $ar3[]=100; //push 此處為索引式及關連式混用。
    
    foreach($ar3 as $k=>$v){
        echo "$k, $v <br>";
    }
    echo "--------------<br>";

    foreach($_GET as $k => $v){
        echo "$k, $v <br>";
    }

    ?>
</body>
</html>