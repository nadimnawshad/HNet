<?php
include('../model/db.php');
session_start()
   $connection = new db();
   $conobj=$connection->OpenCon();   
   $inserted=$connection->InsertSensordata($conobj,"sensor_history",$_SESSION['userId'],$_REQUEST['temperature'],$_REQUEST['humidity']);
   if($inserted){
      echo "Inserted";
   }
?>