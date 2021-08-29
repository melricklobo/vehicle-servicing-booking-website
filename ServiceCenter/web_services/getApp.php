<?php

    header('Content-type: application/json');

    require_once '../config/connect.php';

    $appid = $_POST['appid'];


    $ser_sql = mysqli_query($connect,"select service_name from services_offered  where service_id in (select service_id from opted_services where appointment_id = '$appid')");

    $response_array = [];
    $response_array['data'] = [];
    while($data = mysqli_fetch_array($ser_sql)){
        $response_array['data'][] = $data;
        $response_array['status'] = "success";
    }
    
    $app_sql = mysqli_query($connect,"select description from appointment where appointment_id = '$appid'");

    while($app_data = mysqli_fetch_assoc($app_sql)){
        $response_array['app'] = $app_data['description'];
        $response_array['status'] = "success";
    }


    echo json_encode($response_array);

?>