<?php
$host = "localhost";
$user = "root"; //Default XAMPP MySQL user
$pass = ""; // Default XAMPP MySQL password (empty)
$db = "profile_management_db";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>