<?php
require_once "./database.php";
$email =  $_GET['user_email'];

$conn = new Database();
$db = $conn->connect();

$result = $db->query("UPDATE `users` SET `email_verified` = 1 WHERE `email` = '$email'");
if($result) { 
    header("location:http://task.loc/views/auth/login.php"); 
}
