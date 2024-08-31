<?php
include('../model/db.php');
session_start();

$connection = new db();
$conobj=$connection->OpenCon();
echo $_SESSION["userId"];
$email=$connection->CheckUserEmail($conobj,"user_bio",$_SESSION["userId"]);
$name=$connection->CheckUserName($conobj,"user_bio",$email);
$plant_name=$connection->CheckPlantName($conobj,"user_current_plant",$_SESSION["userId"]);
$plant_info=$connection->ShowAllPlant($conobj,"plant_info");
$plant_info_description=$connection->ShowAllPlant($conobj,"plant_info");
$new_plant_option=$connection->ShowAllPlant($conobj,"plant_info");

if (isset($_POST["add_plant"])){
    $plant_name = isset($_POST['plant_option_selection']) ? $_POST['plant_option_selection'] : '';

    $query = $connection->UpdatePlantDetails($conobj,"user_current_plant",$_SESSION["userId"],$plant_name);

    if($query)
    {
        echo "<script>alert('Plant change successfully')</script>";
        
    }
    else{
        echo "<script>alert('Plant change unsuccessfull')</script>";
    }
}
    
//     
//     
//     $validMessMember = $connection->ValidMessMember($conobj,"mess_info",$mess_name,$member_email,'pending');



// }

$connection->CloseCon($conobj);

?>
