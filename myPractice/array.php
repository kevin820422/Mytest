<?php 
$myArray=[];
$myArray[]=1;
$myArray[]=3;
foreach ($myArray as $k){
    echo $k;
};
print_r($myArray); 
$food=array('french'=>['entree','plates','dessert'],'chinese'=>['appetizer','main_dishes','soup','fruit','tea']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php foreach($food as $k): ?>
    <?php $n=count($food[$k]); ?>
    <?= "{$k} style cuisine mainly have {$n} dishes."  ?>
    <?php endforeach ?>
        
   
    
</body>
</html>


    



