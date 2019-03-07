<?php
$db_host = 'localhost';
$db_name = 'mytest';
$db_user = 'benjamin';
$db_pass = '12345678';

try {
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    $pdo->query("SET NAMES utf8"); //將編碼改為UTF8,順利讀取中文字
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error: ' . $ex->getMessage();
}
 