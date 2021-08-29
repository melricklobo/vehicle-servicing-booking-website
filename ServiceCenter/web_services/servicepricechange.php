<?php

header('Content-type: application/json');

require_once '../config/connect.php';

$price = $_POST['price'];
$servid = (int)$_POST['servid'];

$sql_price = mysqli_query($connect,"update services_offered set service_price = '$price' where service_id = '$servid'");

if($sql_price){
    $response['status'] = "success";
}
else{
    echo "error";
}

echo json_encode($response);

?>