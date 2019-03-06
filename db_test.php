<?php

include __DIR__. '/__connect_db.php';

try {

    $stmt = $pdo->query("SELECT * FROM `address_book` ");

} catch(PDOException $ex){
    echo $ex->getMessage();

}

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
    echo '<br>';
}