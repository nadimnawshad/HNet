<?php
include('../model/db.php');
session_start();
$error="";
$meal_lunch_ratio="";
$meal_dinner_ratio="";
$breakfast_rate=0;
$lunch_rate=0;
$dinner_rate=0;
$breakfast_meal_rate=0;
$lunch_meal_rate=0;
$dinner_meal_rate=0;
$month = strval(date("M-Y"));

$connection = new db();
$conobj=$connection->OpenCon();
$email=$connection->CheckUserEmail($conobj,"user_bio",$_SESSION["userId"]);
$mess_name=$connection->CheckMessName($conobj,"mess_info",$email);
$meal_per_day=$connection->CheckMealPerDay($conobj,"meal_management",$mess_name);

$meal_rates=$connection->getInfoByMessMonth($conobj,"meal_details",$mess_name,$month);
    if ($meal_rates->num_rows > 0) {
        while($row = $meal_rates->fetch_assoc()) {
            $breakfast_rate = $row["breakfast_cost"];
            $lunch_rate = $row["lunch_cost"];
            $dinner_rate = $row["dinner_cost"];
        }
    }


//bazar code

//******************************************
    // meal per day
if (isset($_POST['mealPerDayUpdate'])) { 
    $meal_per_day = $_REQUEST['meal_per_day'];
    if($meal_per_day=='3')
    {
        $breakfast = 1;     
    }
    elseif ($meal_per_day=='2') {
        $breakfast = 0;    
    }
    $userQuery=$connection->UpdateMealPerDay($conobj,"meal_management",$email,$mess_name,$meal_per_day,$breakfast);
    if($userQuery)
    {
        $message = " Meal Per day Update Successfully.";
    }
    else{
        $message = " Meal Per day Update failed.";
    }
    function_alert($message);
}

//******************************************
    // meal ratio

if (isset($_POST['mealRatio'])){
    $lunch_ratio = $_REQUEST['lunch'];
    $dinner_ratio = $_REQUEST['dinner'];
    if($meal_per_day=='3')
    {
        $breakfast_ratio = $_REQUEST['breakfast'];     
    }
    elseif ($meal_per_day=='2') {
        $breakfast_ratio = 0;    
    }
    $userQuery=$connection->UpdateMealRatio($conobj,"meal_management",$mess_name,$breakfast_ratio,$lunch_ratio,$dinner_ratio);

    $userQuery_two=$connection->UpdateDetailsInfoMealRatio($conobj,"meal_details",$mess_name,$breakfast_ratio,$lunch_ratio,$dinner_ratio,$month);
    if($userQuery == TRUE && $userQuery_two == TRUE)
    {
        $message = " Meal Ratio Update Successfully.";
    }
    else{
        $message = " Meal Ratio Update failed.";
    }
    function_alert($message);
}
if (isset($_POST['extra_bazar'])){
    
    $bzr_day = $_REQUEST['bazar_day'];
    $bzr_month = $_REQUEST['bazar_month'];
    $bzr_year = $_REQUEST['bazar_year'];
    $bzr_cost = $_REQUEST['bazar_cost'];
    $bazar_date = strval($bzr_day)." ".$bzr_month.", ".$bzr_year;
    $bazar_month = $bzr_month."-".$bzr_year;

    $userQuery=$connection->InsertBazar($conobj,"bazar_details",$mess_name,$bazar_date,$bazar_month,'manager',$bzr_cost);

    if($userQuery)
    {
        $message = " Bazar Updated Successfully.";
    }
    else{
        $message = " Bazar update failed.";
    }
    function_alert($message);

}


if (isset($_POST['other_cost'])){
    
    $otr_day = $_REQUEST['other_cost_day'];
    $otr_month = $_REQUEST['other_cost_month'];
    $otr_year = $_REQUEST['other_cost_year'];
    $otr_cost = $_REQUEST['other_cost'];
    $otr_date = strval($otr_day)." ".$otr_month.", ".$otr_year;
    $otr_month = $otr_month."-".$otr_year;

    $userQuery=$connection->InsertOtherCost($conobj,"bazar_details",$mess_name,$otr_date,$otr_month,'manager',$otr_cost);

    if($userQuery)
    {
        $message = " Other cost Updated Successfully.";
    }
    else{
        $message = " Other cost update failed.";
    }
    function_alert($message);

}


if (isset($_POST['set_utility'])){
    
    $house_rent = $_REQUEST['house_rent'];
    $electricity_bill = $_REQUEST['electricity_bill'];
    $gas_bill = $_REQUEST['gas_bill'];
    $wifi_bill = $_REQUEST['wifi_bill'];
    $other_bills = $_REQUEST['other_bills'];

    $userQuery=$connection->SetUtlities($conobj,"utilities",$mess_name,$house_rent,$electricity_bill,$gas_bill,$wifi_bill,$other_bills);

    if($userQuery)
    {
        $message = " Other cost Updated Successfully.";
    }
    else{
        $message = " Other cost update failed.";
    }
    function_alert($message);

}


$connection->CloseCon($conobj);

?>
