<?php

header('Content-type: application/json');

require_once '../config/connect.php';

$name = $_POST['customer-name'];
$num = $_POST['customer-contact'];
$email = $_POST['customer-email'];
$password = $_POST['customer-password'];
$address = $_POST['customer-address'];

$sql_verify = mysqli_query($connect,"select email from users where email='$email'");
    if(mysqli_num_rows($sql_verify) > 0){
        // echo "fail";
        $response_array['status']='duplicate';
    }
    else{
        $sql_insert = mysqli_query($connect,"insert into customers values ('','$name','$num','$email','$address')");
        $sql_register = mysqli_query($connect,"insert into users values ('','$email','$password','customer')");
        if($sql_insert && $sql_register){
            // echo "inserted";
            $response_array['status']='success';
        }
        else{
            // echo "failure";
            $response_array['status']='failed';
    
        }
       
    }

echo json_encode($response_array);


?>