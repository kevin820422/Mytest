<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <pre>
<?php
class Person{
    public $name;
    public $mobile; # 公開屬性
    private $sno = 'A1234';   # 私有屬性

    // 建構函式
    function __construct($name = 'John', $mobile = '0925'){
        $this->name = $name;
        $this->mobile = $mobile;
        echo '__construct<br>';
    }

    // getter
    function getSno(){
        return $this->sno;
    }
    // setter
    function setSno($sno){
        $this->sno = $sno;
    }
}

$p = new Person('Flora', '0918');
//unset($p); //解構
// $p = new Person;

echo $p->getSno();
echo '<br>';
$p->setSno('B567');
echo $p->getSno();
echo '<br>';
echo "$p->name <br>";
echo "$p->mobile <br>";


print_r($p);


?>
</pre>
</body>

</html> 