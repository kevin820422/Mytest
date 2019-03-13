<?php
require __DIR__ . '/__cred.php';
require __DIR__ . '/__connect_db.php';

$per_page = 5;

$result = [
    'success' => false,
    'page' => 0,
    'totalRows' => 0,
    'perPage' => $per_page,
    'totalPages' => 0,
    'data' => [],
    'errorCode' => 0,
    'errorMsg' => '',
];

$page = isset($_GET['page']) ? $_GET['page'] : 1;

//算總筆數
$t_sql = "SELECT COUNT(1) FROM address_book";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
$result['totalRows']=$total_rows;

//總頁數
$total_pages = ceil($total_rows / $per_page);
$result['totalPages']=$total_pages;

if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;
$result['page']=$page;

$sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);

// 所有資料一次拿出來
$result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result['success'] = true;

echo json_encode($result, JSON_UNESCAPED_UNICODE);
