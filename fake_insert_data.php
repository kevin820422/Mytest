<?php
require __DIR__ . '/__connect_db.php';

$begin = microtime(true);
echo $begin. '<br>';

$sql = "INSERT INTO `address_book`(
        `name`, `email`, `mobile`, `birthday`, `address`
        ) VALUES (
          ?, ?, ?, ?, ?
        )";
//將值填進去，還未執行
$stmt = $pdo->prepare($sql);

//開始transaction
$pdo->beginTransaction();
//執行
for ($i = 1; $i < 1000; $i++) {
    $stmt->execute([
        "李小明$i",
        "ming{$i}@gmail.com",
        "0918$i",
        "1990-02-03",
        "台南市$i",
    ]);
}

$pdo->commit();

$end=microtime(true);
echo $end. '<br>';
echo $end-$begin. '<br>';

// $stmt->execute([
//     $_POST['name'],
//     $_POST['email'],
//     $_POST['mobile'],
//     $_POST['birthday'],
//     $_POST['address'],
// ]);
