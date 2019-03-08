<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="GET">
        <select name="items[]" id="" multiple="multiple" size="">
            <option value="apple">Apple</option>
            <option value="banana">Banana</option>
            <option value="grape">Grape</option>
            <option value="melon">Melon</option>
        </select>
        <br>
        <button type="submit">確定
        </button>
        <br>

        <?php
        if (isset($_GET["items"])) {
            foreach ($_GET["items"] as $v) {
                echo $v . '<br>';
            }
        } else {
            echo 'Choose your favorite fruit!';
            };
            ?>



    </form>
</body>
 

</html>