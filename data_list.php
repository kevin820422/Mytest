<?php

require __DIR__ . '/__connect_db.php';
$page_name = 'data_list';

$per_page = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

//算總筆數
$t_sql = "SELECT COUNT(1) FROM address_book";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

//總頁數
$total_pages = ceil($total_rows / $per_page);
$sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);

if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;


// 所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include __DIR__ . '/__html_head.php'; ?>
<?php include __DIR__ . '/__navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav>
                <ul class="pagination pagination-sm">
                <li class="page-item"><a class="page-link <?= $page<=1 ?'disable':'' ?>" href="?page=<?= $page-1 ?>">Previous</a></li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor ?>
                    <li class="page-item">
                    
                    <a class="page-link <?= $page>=$total_pages ?'disable':'' ?>" href="?page=<?= $page+1 ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- <div><?= $total_rows ?></div>
    <div><?= $stmt->rowCount() ?></div> -->
    <table class="table border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Birthday</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php $i = 0; ?> -->
            <?php foreach ($rows as $row) : ?>
            <!-- <?php $i += 1; ?> -->
            <tr>
                <!-- <td><?= $i ?></td> -->
                <td><?= $row['sid'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['mobile'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['birthday'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/__html_foot.php'; ?> 