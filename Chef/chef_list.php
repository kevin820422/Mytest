<?php 
require __DIR__ . '/connect.php';
$page_name = 'chef_list';

$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//算總比數
$t_sql = "SELECT COUNT(1) FROM chef";
$t_stmt = $pdo->query($t_sql);
$total_rows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

//總頁數
$total_pages = ceil($total_rows / $per_page);
if ($page > $total_pages) $page = $total_pages;
if ($page < 1) $page = 1;
$sql = sprintf("SELECT * FROM chef ORDER BY sid LIMIT %s, %s", ($page - 1) * $per_page, $per_page);
$stmt = $pdo->query($sql);

//所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include __DIR__ . '/_html_header.php' ?>
<?php include __DIR__ . '/_navbar.php' ?>

<br>
<div class="form_data_font_style"><?= '總共' . $total_pages . '頁' ?></div>

<div class="col-md-4 center_div">
    <nav aria-label="...">
        <ul class="pagination pagination-sm">

            <li class="page-item <?= $page <= 1 ? 'disable' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>">&lt;</a>
            </li>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </span>
            </li>
            <?php endfor ?>

            <li class="page-item <?= $page >= $total_pages ? 'disable' : '' ?>">
                <a class="page-link" href="?page=<?= $page + 1 ?>">&gt;</a>
            </li>

        </ul>
    </nav>
</div>

<a href="cooking_house_insert.php"><button type="button" class="btn btn-primary btn-block col-md-8 center_div">插入一筆測試資料</button></a>
<br>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Mobile</th>
            <th scope="col">Birthday</th>
            <th scope="col">Picture</th> 
            <th scope="col">Experience</th>
            <th scope="col">Area</th> 
            <th scope="col">Restaurant</th>
            <th scope="col">Own Kitchen</th> 
            <th scope="col">Tool</th>
            <th scope="col">Note</th>
            <div col-md-6>
                <th scope="col">Web</th>
                <th scope="col">Intro</th>
                <th scope="col">刪除</th>
                <th scope="col">編輯</th>
            </div>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr class="form_data_font_style">
            <td><?= $row['sid'] ?></td>
            <th scope="col">#</th>
            <th scope="col"><?= $row['name'] ?></th>
            <th scope="col"><?= $row['email'] ?></th>
            <th scope="col"><?= $row['password'] ?></th>
            <th scope="col"><?= $row['mobile'] ?></th>
            <th scope="col"><?= $row['birthday'] ?></th>
            <th scope="col"><?= $row['pic'] ?></th> <!--抓照片檔名 -->
            <th scope="col"><?= $row['experience'] ?></th>
            <th scope="col"><?= $row['area'] ?></th> <!--抓區域 -->
            <th scope="col"><?= $row['restaurant'] ?></th> <!--抓餐廳名單 -->
            <th scope="col"><?= $row['own_kitchen'] ?></th>
            <th scope="col"><?= $row['tool'] ?></th> <!--抓工具 -->
            <th scope="col"><?= $row['note'] ?></th>
            


        </tr>
        <?php endforeach; ?>
    </tbody>


</table> 