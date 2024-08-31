<?php
include('../model/db.php');
   $connection = new db();
   $conobj=$connection->OpenCon();   
   $plant_description=$connection->getInfoByPlantName($conobj,"plant_info",$_REQUEST['plant_name']);
   if ($plant_description->num_rows > 0){
      while($row = $plant_description->fetch_assoc()) {
            echo $row["plant_description"];
      }
   }
?>