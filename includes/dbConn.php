<?php
$servername = "localhost";
$username = "root";
$password = "lhy_2016";
$db_name = "company";

$conn = new mysqli($servername,$username,$password,$db_name);
if ($conn->connect_error) {
    echo($conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}
?>