<?php
include('../model/db.php');
session_start();

$time = strval(date("Y-m-d H:i:s"));
$connection = new db();
$conobj= $connection->OpenCon();
$email= $connection->CheckUserEmail($conobj,"user_bio",$_SESSION["userId"]);
$name= $connection->CheckUserName($conobj,"user_bio",$email);
$temperature = $connection->CheckTemp($conobj,"sensor_history",$_SESSION["userId"]);
$humidity = $connection->CheckHumidity($conobj,"sensor_history",$_SESSION["userId"]);

?>