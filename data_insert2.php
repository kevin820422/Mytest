<?php
require __DIR__ . '/__cred.php';
require __DIR__ . '/__connect_db.php';
$page_name = 'data_insert2';

?>
<?php include __DIR__ . '/__html_head.php';  ?>
<?php include __DIR__ . '/__navbar.php';  ?>
<style>
    .form-group small {
        color: red !important;
    }
</style>
<div class="container">

    <div class="row">
        <div class="col-lg-6">
            <div id="info_bar" class="alert alert-" role="alert" 　style="display:none"></div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料
                    </h5>
                    <form name="form1" method="post" onsubmit="return checkForm();">
                        <input type="hidden" name="checkme" value="check123">
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="">
                            <small id="nameHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">電郵</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="" value="">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="" value="">
                            <small id="mobileHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="YYYY-MM-DD" value="">
                            <small id="birthdayHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="3"></textarea>
                            <small id="addressHelp" class="form-text text-muted"></small>
                        </div>

                        <button id="submit_btn" type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>




</div>
<script>
    const info_bar = document.querySelector('#info_bar');
    const submit_btn = document.querySelector('#submit_btn');


    const fields = [
        'name',
        'email',
        'mobile',
        'birthday',
        'address',
    ];

    // 拿到每個欄位的參照
    const fs = {};
    for (let v of fields) {
        fs[v] = document.form1[v];
    }
    console.log(fs);
    console.log('fs.name:', fs.name);


    const checkForm = () => {
        let isPassed = true;
        info_bar.style.display = 'none';

        // 拿到每個欄位的值，並且把他們設定為fsv{}物件的屬性
        const fsv = {};
        for (let v of fields) {
            fsv[v] = fs[v].value;
        }
        console.log(fsv);

        let email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        let mobile_pattern = /^09\d{2}\-?\d{3}\-?\d{3}$/;

        for (let v of fields) {
            fs[v].style.borderColor = '#cccccc';
            document.querySelector('#' + v + 'Help').innerHTML = '';
        }

        if (fsv.name.length < 2) {
            fs.name.style.borderColor = 'red';
            document.querySelector('#nameHelp').innerHTML = '請填寫正確的姓名!';

            // isPassed = false;
        }
        if (!email_pattern.test(fsv.email)) {
            fs.email.style.borderColor = 'red';
            document.querySelector('#emailHelp').innerHTML = '請填寫正確的 Email!';
            // isPassed = false;
        }
        if (!mobile_pattern.test(fsv.mobile)) {
            fs.mobile.style.borderColor = 'red';
            document.querySelector('#mobileHelp').innerHTML = '請填寫正確的手機號碼!';
            // isPassed = false;
        }

        if (isPassed) {
            let form = new FormData(document.form1);
            submit_btn.style.display = 'none';

            fetch('data_insert2_api.php', {
                    method: 'POST',
                    body: form
                }).then(response => response.json())
                .then(obj => {
                    console.log(obj);
                    info_bar.style.display = 'block';

                    if (obj.success) {
                        info_bar.className = 'alert alert-success';
                        info_bar.innerHTML = '資料新增成功';
                    } else {
                        info_bar.className = 'alert alert-danger';
                        info_bar.innerHTML = obj.errorMsg;
                    }

                    submit_btn.style.display = 'block';
                });
        }
        return false;
    };
</script>
<?php include __DIR__ . '/__html_foot.php';  ?> 