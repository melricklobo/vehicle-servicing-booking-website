<?php

header('Content-type: application/json');

require_once '../config/connect.php';

$appid = (int)$_POST['appid'];

$sql_date = mysqli_query($connect,"delete from appointment where appointment_id = '$appid'");

if($sql_date){
    $response['status'] = "success";
}
else{
    echo "error";
}

echo json_encode($response);

?>