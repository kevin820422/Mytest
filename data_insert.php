<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'data_insert';

if (isset($_POST['checkme'])) {
    //標準做法 prepare
    $sql = "INSERT INTO `address_book`(
        `name`, `email`, `mobile`, `birthday`, `address`
        ) VALUES (
          ?, ?, ?, ?, ?
        )";
    //將值填進去，還未執行
    $stmt = $pdo->prepare($sql);
    
    //執行
    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        $_POST['birthday'],
        $_POST['address'],
    ]);
    /*
    $sql = sprintf(
        " INSERT INTO `address_book`(
        `name`,`email`,`mobile`,`birthday`,`address`
    ) VALUES(
        '%s','%s','%s','%s','%s'
     )",
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        $_POST['birthday'],
        $_POST['address']
    );
    // echo $sql; exit; // 測試 SQL 長什麼樣子

    $stmt = $pdo->query($sql);
    */
}
?>


<?php include __DIR__ . '/__html_head.php'; ?>
<?php include __DIR__ . '/__navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料<?=isset($stmt)?"{$stmt->rowCount()}筆":''?></h5>
                    
                    <form method="post">
                        <div class="form-group">
                            <input type="hidden" name="checkme" value="check123">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                            <small id="nameHelp" class="form-text text-muted"></small>
                            <div class="form-group">
                                <label for="email">姓名</label>
                                <input type="text" class="form-control" id="name" name="email" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="mobile">手機</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="">
                                <small id="mobileHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="birthday">生日</label>
                                <input type="text" class="form-control" id="birthday" name="birthday" placeholder="">
                                <small id="birthdayHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="address">地址</label>
                                <textarea class="form-control" id="address" name="address" cols="30" rows="3"></textarea>
                                <small id="addressHelp" class="form-text text-muted"></small>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/__html_foot.php';  ?> 