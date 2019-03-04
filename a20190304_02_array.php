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

    $ar1=array(2,3,4);

    $ar2=[5,6,7];

    $ar3 =array(
        'name' => 'Bill',
        'age' => 20,
        'gender' => 'male',
    );
    $ar1[] = 100;
    $ar3[] = 100;  // push 此處為索引式及關連式混用。
    
    echo'<pre>';
    print_r($ar1);
    print_r($ar3);
    echo'</pre>';
    ?>
</body>
</html>