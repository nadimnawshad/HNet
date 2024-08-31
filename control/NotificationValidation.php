<?php
include('../model/db.php');
session_start();

$connection = new db();
$conobj=$connection->OpenCon();
$connection->UpdateNotificationStatus($conobj,"notification",$_SESSION["userId"],$_REQUEST['notification_name'],$_REQUEST['time']);
$connection->CloseCon($conobj);

?>
