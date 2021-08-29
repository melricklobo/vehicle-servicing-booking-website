<?php

header('Content-type: application/json');

require_once '../config/connect.php';

$name = $_POST['employee-name'];
$num = $_POST['employee-contact'];
$email = $_POST['employee-email'];
$password = $_POST['employee-password'];
$address = $_POST['employee-address'];

$sql_verify = mysqli_query($connect, "select email from users where email='$email'");
if (mysqli_num_rows($sql_verify) > 0) {
    // echo "fail";
    $response_array['status'] = 'duplicate';
} else {
    $sql_insert = mysqli_query($connect, "insert into employee values ('','$name','$num','$email','$address')");
    $sql_register = mysqli_query($connect, "insert into users values ('','$email','$password','employee')");
    if ($sql_insert && $sql_register) {
        // echo "inserted";
        $response_array['status'] = 'success';
    } else {
        // echo "failure";
        $response_array['status'] = 'failed';
    }
}

echo json_encode($response_array);
