<?php
include('../model/db.php');
session_start();

$connection = new db();
$conobj=$connection->OpenCon();
$email=$connection->CheckUserEmail($conobj,"user_bio",$_SESSION["userId"]);
$name=$connection->CheckUserName($conobj,"user_bio",$email);

$notification_query=$connection->getAllNotification($conobj,"notification",$_SESSION["userId"]);

$connection->CloseCon($conobj);

?>
