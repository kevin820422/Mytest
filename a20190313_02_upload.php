<?php

$upload_dir = __DIR__. '/uploads/';

if(empty($_FILES['my_file'])){
    exit;
}

foreach($_FILES['my_file']['error'] as $k=>$error){
    if($error == UPLOAD_ERR_OK){
        move_uploaded_file(
            $_FILES['my_file']['tmp_name'][$k],
            $upload_dir. $_FILES['my_file']['name'][$k]
        );
    }
    //else{
    //     echo $_FILES['my_file']["error"];
    // }
}
echo 'OK';
