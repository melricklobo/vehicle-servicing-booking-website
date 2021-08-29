<?php

header('Content-type: application/json');

require_once '../config/connect.php';

$servid = (int)$_POST['servid'];

$sql_date = mysqli_query($connect,"delete from services_offered where service_id = '$servid'");

if($sql_date){
    $response['status'] = "success";
}
else{
    echo "error";
}

echo json_encode($response);

?>