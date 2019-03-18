<?php
require __DIR__.'/connect.php';


$sql = "INSERT INTO `cooking_house` 
(`name`, `phone`, `address`, `web`, `intro`)
VALUES(?,?,?,?,?)";


$stmt = $pdo->prepare($sql);

$pdo->beginTransaction();

for($i=1;$i<2;$i++)
{
    $stmt->execute([
        '測試用料理空間',
        '02 1234',
        '台北市測試用地址',
        'website',
        '測試用料理空間介紹'
    ]);
}

$pdo->commit();
$end = microtime(true);
echo $end. '<br>';
echo $end-$begin. '<br>';

// $sql ="INSERT INTO `cooking_house` (`name`, `phone`, `address`, `web`, `intro`)
//   VALUES ('測試用料理空間','02 1234','台北市測試用地址','website','測試用料理空間介紹')";

header('Location: '. $_SERVER['HTTP_REFERER']);
?>