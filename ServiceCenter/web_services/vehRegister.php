<?php

header('Content-type: application/json');

require_once '../config/connect.php';

$vehName = $_POST['vehicle-model'];
$vehNum = $_POST['vehicle-reg-number'];
$email = rtrim($_COOKIE['email'],"?");
$cid = '';

$sql_verify = mysqli_query($connect,"select vehicle_registration_no from vehicles where vehicle_registration_no='$vehNum'");
if(mysqli_num_rows($sql_verify) > 0){
    $response_array['status']='duplicate';
}
else{
    
    $sql_cust = mysqli_query($connect,"select customer_id from customers where customer_email='$email'");
    while($data = mysqli_fetch_array($sql_cust)){
        $cid = $data['customer_id'];
    }
    
    $sql_insert = mysqli_query($connect,"insert into vehicles values ('','$vehName','$vehNum','$cid')");

    if($sql_insert){
        $response_array['status']='success';
    }
    else{
        $response_array['status']='failed';
    }
    
}



echo json_encode($response_array);


?>