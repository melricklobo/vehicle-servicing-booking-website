<?php
    $connect = mysqli_connect("localhost","root","","servicecenter");
    if ($connect->connect_error)
    die("Connection failed" . $conn->connect_error);
?>