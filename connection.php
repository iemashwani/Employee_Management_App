<?php

error_reporting(E_ALL);

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "employee";

$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

if ($conn) {
    // echo "Connection Successfull";
} else {
    echo "Connection Failed" . mysqli_connect_error();
}
?>