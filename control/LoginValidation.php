<?php
include('../model/db.php');
session_start();
$error="";
if (isset($_POST['LogIn'])) {
    $email=$_REQUEST['user_email'];
    $password=$_REQUEST['user_password'];

    $connection = new db();
    $conobj=$connection->OpenCon();

    $userQuery=$connection->getInfoByEmailPassword($conobj,"user_login",$email,$password);
    if ($userQuery->num_rows > 0) {
        while($row = $userQuery->fetch_assoc()) {
           $usertype =  $row["type"];
           $id = $row["id"];
           $_SESSION["usertype"] = $usertype;
           $_SESSION["userId"] = $id;
           $cookies_value=$id;
           setcookie("userId",$cookies_value, time() + (3600), "/");
           header("Location: ../view/Dashboard.php");
        }
    }
    else {
        $error = "User Email or Password incorrect. Please try again.";
           header("Location: ../view/Login.php");
    }

    $connection->CloseCon($conobj);
}
if (isset($_POST['SignUp'])) {
    $firstName=$_REQUEST['firstName'];
    $sureName=$_REQUEST['sureName'];
    $name=$firstName." ".$sureName;
    $email=$_REQUEST['email'];
    $phone_number=strval($_REQUEST['phone']);
    $password=$_REQUEST['password'];
    $address=$_REQUEST['address'];

    $connection = new db();
    $conobj=$connection->OpenCon();

    $userQuery=$connection->InsertUser($conobj,"user_bio",$name,$firstName,$sureName,$email,$phone_number,$password,$address);

    if ($userQuery) {
        echo "<script>alert('SignUp Successfull')</script>";
        echo "<script>window.open('../view/Login.php','_self')</script>";
    }
    else {
        echo "<script>alert('Something went wrong. May try changing your email or phone number. Please try again.')</script>";
    }

    $connection->CloseCon($conobj);
} 

?>
