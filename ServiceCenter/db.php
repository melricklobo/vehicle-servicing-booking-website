<?php

$conn = new mysqli("localhost", "root", "", "servicing");

if ($conn->connect_error)
    die("Connection failed" . $conn->connect_error);
