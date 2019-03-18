<?php
require __DIR__. '/connect.php';
$page_name = 'login';
$page_title = '登入';

if(empty($_SERVER['HTTP_REFERER'])){
    $come_from = './';
} else {
    $come_from = $_SERVER['HTTP_REFERER'];
}

?>
<?php include __DIR__. '/_html_header.php' ?>
<?php include __DIR__. '/_navbar.php' ?>


<div class="col-md-4 center_div">
   <form name="form1" method="post" onsubmit="return formCheck()">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> 
        
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Password">
          <small id="passwordHelp" class="form-text"></small>
        </div>
        <!-- <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
<div>

<script>

var fields = ['email', 'password'];
var i, s;
var info = $('#info');
var submit_btn = $('button[type=submit]');
var come_from = '<?= $come_from ?>';

function formCheck(){
    info.hide();
    submit_btn.hide();
    // 讓每一欄都恢復原來的狀態
    for(s in fields){
        cancelAlert(fields[s]);
    }

    var isPass = true;
    var email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;


    if(! email_pattern.test(document.form1.email.value)){
        setAlert('email', '請輸入正確的 email 格式');
        isPass = false;
    }
    if(document.form1.password.value.length < 6){
        setAlert('password', '密碼請輸入六個字以上');
        isPass = false;
    }

    if(isPass)
    {
        $.post('login_api.php', $(document.form1).serialize(), function(data){
            var alertType = 'alert-danger';

            info.removeClass('alert-danger');
            info.removeClass('alert-success');

            if(data.success){
                alertType = 'alert-success';
                setTimeout(function(){
                    location.href = come_from;
                }, 1000);
            } else {
                submit_btn.show();
                alertType = 'alert-danger';
            }
            info.addClass(alertType);
            if(data.info){
                info.html( data.info );
                info.slideDown();
            }
        }, 'json');
      

    } else {
        submit_btn.show();
  
    }

    return false;
}

// 設定警示
function setAlert(fieldName, msg){
    $('#'+fieldName).css('border', '1px solid red');
    $('#'+fieldName+'Help').text(msg);
}

// 取消警示
function cancelAlert(fieldName){
    $('#'+fieldName).css('border', '1px solid #cccccc');
    $('#'+fieldName+'Help').text('');
}
</script>
<?php include __DIR__. '/_html_footer.php' ?>