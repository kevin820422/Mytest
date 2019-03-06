<?php

require __DIR__ . '/__connect_db.php';
$page_name ='data_list';

$stmt = $pdo->query("SELECT * FROM address_book");

// 所有資料一次拿出來
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include __DIR__ . '/__html_head.php'; ?>
<?php include __DIR__ . '/__navbar.php'; ?>

<div class="container">
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