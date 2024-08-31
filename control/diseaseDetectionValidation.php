<?php
include('../model/db.php');
session_start();

$connection = new db();
$conobj=$connection->OpenCon();
$email= $connection->CheckUserEmail($conobj,"user_bio",$_SESSION["userId"]);
$name= $connection->CheckUserName($conobj,"user_bio",$email);
$disease_name="";
$disease_discription="";
$supplement_name ="";
$possible_steps="";
$error="";
if (isset($_POST['submit'])) {
    $img_one_tmpFile = $_FILES['inputDisease_image_one']['tmp_name'];
    $img_dir_one = $_FILES['inputDisease_image_one']['name'];    
    $img_dir_one = str_replace(' ', '', $img_dir_one);
    $img_one_newFile = '../disease_images/'.$img_dir_one;
    $img_one_result = move_uploaded_file($img_one_tmpFile, $img_one_newFile);

    $img_two_tmpFile = $_FILES['inputDisease_image_two']['tmp_name'];
    $img_dir_two = $_FILES['inputDisease_image_two']['name'];   
    $img_dir_two = str_replace(' ', '', $img_dir_two);
    $img_two_newFile = '../disease_images/'.$img_dir_two;
    $img_two_result = move_uploaded_file($img_two_tmpFile, $img_two_newFile);

    $img_three_tmpFile = $_FILES['inputDisease_image_three']['tmp_name'];
    $img_dir_three = $_FILES['inputDisease_image_three']['name'];   
    $img_dir_three = str_replace(' ', '', $img_dir_three);
    $img_three_newFile = '../disease_images/'.$img_dir_three;
    $img_three_result = move_uploaded_file($img_three_tmpFile, $img_three_newFile);

     $_SESSION["img_dir_one"] = $img_dir_one;
     $_SESSION["img_dir_two"] = $img_dir_two;
     $_SESSION["img_dir_three"] = $img_dir_three;
     header("Location: ../python.php");
}

    $connection->CloseCon($conobj);
     
?>
