<?php

header('Content-type: application/json');

require_once '../config/connect.php';

$date = $_POST['date'];
$appid = (int)$_POST['appid'];

$sql_date = mysqli_query($connect,"update appointment set date_booking = '$date' where appointment_id = '$appid'");

if($sql_date){
    $response['status'] = "success";
}
else{
    echo "error";
}

echo json_encode($response);

?>