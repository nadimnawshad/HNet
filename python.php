<?php 
 session_start();   
   $var1 = $_SESSION['img_dir_one'];
   $var2 = $_SESSION['img_dir_two'];
   $var3 = $_SESSION['img_dir_three'];

    $command = escapeshellcmd('C:\xampp\htdocs\hhgg\venv\Scripts\python.exe  C:\xampp\htdocs\hhgg\app.py '.$var1.' '.$var2.' '.$var3); 
    $output = shell_exec($command); 
    $predictionArray = explode('||', $output);
    $disease_name = $predictionArray[1];    
    $disease_discription = $predictionArray[2];    
    $supplement_name = $predictionArray[3];        
    $possible_steps = $predictionArray[4];

    $_SESSION['img_dir_one']="";
    $_SESSION['img_dir_two']="";
    $_SESSION['img_dir_three']="";

    include('view/diseaseResult.php');

?> 