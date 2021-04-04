<?php
date_default_timezone_set('Asia/Bangkok');
$host = "localhost";
$user = "root";
$pwd = "12345678";
$db = "bus";

$conn = mysqli_connect($host, $user, $pwd) or die("ConnectDB Failed");
mysqli_select_db($conn, $db) or die("SelectDB Failed");
mysqli_query($conn, "SET NAMES utf8");
?>