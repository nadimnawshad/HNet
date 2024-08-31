<?php 
    include ('db.php');
    $connection = new db();
    $conobj= $connection->OpenCon();
    $conobj = $connection->NODEMCUConnection();
?>


