<?php

header('Content-type: application/json');

require_once '../config/connect.php';

$sql2 = "select date_booking from appointment group by date_booking having count(date_booking) >= 2";
$result2 = $connect->query($sql2);

$response['data'] = '';

if(mysqli_num_rows($result2)){
    while ($row2 = $result2->fetch_assoc()) {
        $date_echo = $row2["date_booking"];
        $date_disable = date("Y-m-d", strtotime($date_echo));
        $response['data'] = $response['data']."$date_disable,";       
    }
}
else{
    echo "error";
}

echo json_encode($response);

?>