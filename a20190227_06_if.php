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
$age = 20;
if($age>=18):
?>
    <h2>ok</h2>

<?php  else: ?>

    <?= '<h3>nono</h3>' ?>

<?php endif ?>
</body>
</html>