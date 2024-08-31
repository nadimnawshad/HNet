<?php
include('../model/db.php');
session_start();

$connection = new db();
$conobj=$connection->OpenCon();
$email=$connection->CheckUserEmail($conobj,"user_bio",$_SESSION["userId"]);
$name=$connection->CheckUserName($conobj,"user_bio",$email);
$userQuery=$connection->getInfoById($conobj,"plant_disease_history",$_SESSION["userId"]);

$connection->CloseCon($conobj);

?>