<?php

$upload_dir = __DIR__ . '/uploads/';

header('Content-Type: application/json');

//定義回傳初始值
$result = [
    'success' => false,
    'filename' => '',
    'info' => '',
];

//避免有人直接點到php檔而出現錯誤，無傳入檔案時直接結束
if(empty($_FILES['my_file'])){
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
}

//將上傳的檔案名稱編碼，防止檔案重複
$filename = sha1($_FILES['my_file']['name']. uniqid());

//判別上傳的圖片類型，加入副檔名()。如非png/jpg，傳出'格式不符'訊息。
switch($_FILES['my_file']['type']){
    case 'image/jpeg':
        $filename .= '.jpg';
        // .= 連接字串
        break;
    case 'image/png':
        $filename .= '.png';
        break;
    default:
        $result['info'] = '格式不符';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
}


$result['filename'] = $filename;

//包含檔名&附檔名的檔案路徑
$upload_file = $upload_dir. $filename;


//搬移檔案至指定的 'upload' 的資料夾
//move_uploaded_file(暫存檔案名稱,目的路徑及檔名)
if(move_uploaded_file($_FILES['my_file']['tmp_name'], $upload_file)){
    $result['success'] = true;
} else {
    $result['info'] = '暫存檔無法搬移';
}

//印出結果並以json格式編碼
echo json_encode($result, JSON_UNESCAPED_UNICODE);