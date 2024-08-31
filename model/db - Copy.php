<?php
class db{
 
function OpenCon() {
$dbhost = "localhost:3310";
$dbuser = "root";
$dbpass = "";
$db = "mess_management";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
return $conn;
}
//***************** SignUp **********************************
function duplicateMess($conn,$table,$mess_name){
    $query = $conn->query("SELECT * FROM ". $table." WHERE mess_name='". $mess_name."'");

}
function InsertUser($conn,$table,$logTable,$name,$firstName,$sureName,$email,$phone_number,$password,$gender,$address) {
    $query = $conn->query("SELECT * FROM ". $table." WHERE email='". $email."'");
    if ($query->num_rows === 0) {
        $sql = "INSERT INTO $table (name,    first_name,  sure_name,   email,   phone_number,   gender,  address ) VALUES ('$name','$firstName','$sureName','$email','$phone_number','$gender','$address')";
            if ($conn->query($sql) === TRUE) {
                $result= TRUE;
                $user_info = $conn->query("SELECT * FROM ".$table." WHERE email='". $email."'");
                while($row = $user_info->fetch_assoc()){
                    $id = $row["id"];
                }
                $conn->query("INSERT INTO $logTable (id,  email,   password) VALUES ('$id','$email','$password')");
                $conn->query("INSERT INTO mess_info (name,  email) VALUES ('$name','$email')");
            } else {
                $result= FALSE ;
            }   
    }
    else{
        $result= FALSE ;
    }
    return $result ;
}
//***************** Login **************************************
function CheckUserEmail($conn,$table,$id) {
    $result = $conn->query("SELECT * FROM ". $table." WHERE id='". $id."'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           return $row["email"];
        }
    }
}

function CheckUserName($conn,$table,$email) {
    $result = $conn->query("SELECT * FROM ". $table." WHERE email='". $email."'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           return $row["name"];
        }
    }
}

function CheckUser($conn,$table,$email,$password) {
    $result = $conn->query("SELECT * FROM ". $table." WHERE email='". $email."' AND password='". $password."'");
    return $result;
}

function CheckType($conn,$table,$email){
    $result = $conn->query("SELECT * FROM ". $table." WHERE email='". $email."'");
    if ($result->num_rows > 0 ) {
        while($row = $result->fetch_assoc()) {
           return $row["type"];
        }
    }    
}

//************************** Meal ****************************************

function InsertMessMeal($conn,$table,$manager_email,$mess_name){
    $sql = $conn->query("INSERT INTO $table (mess_name,manager_email) VALUES ('$mess_name','$manager_email')");
}


function CheckMealPerDay($conn,$table,$mess_name) {
    $result = $conn->query("SELECT * FROM ". $table." WHERE mess_name='". $mess_name."'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           return $row["meal_per_day"];
        }
    }
}


function CheckMealRatio($conn,$table,$email,$mess_name) {
    $result = $conn->query("SELECT * FROM ". $table." WHERE mess_name='". $mess_name."'");
    return $result;
}

function UpdateMealPerDay($conn,$table,$email,$mess_name,$meal_per_day,$breakfast_ratio) {
    $sql = "UPDATE $table SET meal_per_day= '$meal_per_day', breakfast_ratio= $breakfast_ratio WHERE manager_email='". $email."' AND mess_name='". $mess_name."'";
        
        if ($conn->query($sql) === TRUE) {
         $result= TRUE;
        } else {
         $result= FALSE ;
        }
        return $result ;
}

function UpdateMealRatio($conn,$table,$mess_name,$breakfast_ratio,$lunch_ratio,$dinner_ratio) {
    $sql = "UPDATE $table SET breakfast_ratio= $breakfast_ratio, lunch_ratio= $lunch_ratio, dinner_ratio= $dinner_ratio WHERE mess_name='". $mess_name."'";

    $conn->query("UPDATE 'meal_details' SET breakfast_ratio= $breakfast_ratio, lunch_ratio= $lunch_ratio, dinner_ratio= $dinner_ratio WHERE mess_name='". $mess_name."'");
        
        if ($conn->query($sql) === TRUE) {
         $result= TRUE;
        } else {
         $result= FALSE ;
        }
        return $result ;
}

function getMealDetails($conn,$table,$mess_name,$month){
    $result = $conn->query("SELECT * FROM ". $table." WHERE mess_name='". $mess_name."'AND month='". $month."'");
    return $result;
}


function setMealDetails($conn,$table,$mess_name,$breakfast_meal,$lunch_meal,$dinner_meal,$breakfast_ratio,$lunch_ratio,$dinner_ratio,$month){
    $result = $conn->query("SELECT * FROM ". $table." WHERE mess_name='". $mess_name."'AND month='". $month."'");
        if ($result->num_rows > 0 ){
            $conn->query("UPDATE $table SET breakfast_meal = breakfast_meal+$breakfast_meal, lunch_meal = lunch_meal+$lunch_meal, dinner_meal = dinner_meal+$dinner_meal WHERE mess_name='$mess_name'AND month='$month'");
        }
        else{
            $conn->query("INSERT INTO $table (mess_name,total_meal, breakfast_meal, lunch_meal, dinner_meal,breakfast_ratio,total_ratio, lunch_ratio, dinner_ratio, month ) VALUES ('$mess_name',$breakfast_meal+$lunch_meal+$dinner_meal,$breakfast_meal,$lunch_meal,$dinner_meal,$breakfast_ratio+$lunch_ratio+$dinner_ratio,$breakfast_ratio, $lunch_ratio,$dinner_ratio,'$month')");
        } 
}

function setMealCosts($conn,$table,$mess_name,$breakfast_rate,$lunch_rate,$dinner_rate,$month) { 
    $sql = "UPDATE $table SET breakfast_cost= $breakfast_rate, lunch_cost= $lunch_rate, dinner_cost= $dinner_rate WHERE mess_name='". $mess_name."'AND month='". $month."'";
        
        if ($conn->query($sql) === TRUE) {
         $result= TRUE;
        } else {
         $result= FALSE ;
        }
        return $result ;
}

function updateMonthlyMeals($conn,$table,$name,$email,$mess_name,$breakfast_meal,$lunch_meal,$dinner_meal,$month){
        $query = $conn->query("SELECT * FROM ". $table." WHERE email='". $email."' AND mess_name='". $mess_name."'");
        if ($query->num_rows > 0 ){
            $conn->query("UPDATE $table SET breakfast_meal = breakfast_meal+$breakfast_meal, lunch_meal = lunch_meal+$lunch_meal, dinner_meal = dinner_meal+$dinner_meal WHERE email = '". $email."'");
        }
        else{
            $conn->query("INSERT INTO $table (name, email, mess_name, breakfast_meal, lunch_meal, dinner_meal,month ) VALUES ('$name','$email','$mess_name',$breakfast_meal,$lunch_meal,$dinner_meal,'$month')");
        }
        $sql = $this->CheckMealRatio($conn,"meal_management",$email,$mess_name);

        if ($sql->num_rows > 0 ){                    
            while($row = $sql->fetch_assoc()) {
                $breakfast_ratio = $row["breakfast_ratio"];
                $lunch_ratio = $row["lunch_ratio"];
                $dinner_ratio = $row["dinner_ratio"];
            }
        }        
        $this->setMealDetails($conn,"meal_details",$mess_name,$breakfast_meal,$lunch_meal,$dinner_meal,$breakfast_ratio,$lunch_ratio,$dinner_ratio,$month);

}

function InsertMessPerMeal($conn,$table,$name,$email,$mess_name,$month){
    $sql = $conn->query("INSERT INTO $table (name,email,mess_name,month) VALUES ('$name','$email','$mess_name','$month')");
}

function getMealUpdateInfo($conn,$table,$email,$mess_name,$day){
    $result = $conn->query("SELECT * FROM ". $table." WHERE email='". $email."' AND mess_name='". $mess_name."' AND day='". $day."'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           return $row["update_meal_daily"];
        }
    }
    else{
        return "not_assigned";
    }
}


function updatePerMeal($conn,$table,$name,$email,$mess_name,$breakfast_meal,$lunch_meal,$dinner_meal,$day,$month,$update_meal_daily){
    $query = "UPDATE $table SET breakfast_meal= $breakfast_meal, lunch_meal = $lunch_meal, dinner_meal = $dinner_meal,update_meal_daily='$update_meal_daily' WHERE mess_name='". $mess_name."'AND day='". $day."'AND email='". $email."'";
    
    if ($conn->query($query) === TRUE) {
        $result= TRUE;
        $this->updateMonthlyMeals($conn,"per_meal_monthly",$name,$email,$mess_name,$breakfast_meal,$lunch_meal,$dinner_meal,$month);
    } else {
     $result= FALSE ;
    }
    return $result ;         
}


function updateDailyDefaultMealInfo($conn,$table,$name,$email,$mess_name,$day,$month,$update_meal_daily){
    $sql = "INSERT INTO $table (name, email, mess_name, day, month, update_meal_daily) VALUES ( '$name','$email','$mess_name','$day','$month','$update_meal_daily')";
    if($conn->query($sql)){
        return TRUE;        
        $this->updateMonthlyMeals($conn,"per_meal_monthly",$name,$email,$mess_name,$breakfast_meal,$lunch_meal,$dinner_meal,$month);
    } 
    else{
        return FALSE;
    }
}


//************************* Bazar ********************************************


function InsertMessBazar($conn,$table,$mess_name,$month){
    $sql = $conn->query("INSERT INTO $table (mess_name,month) VALUES ('$mess_name','$month')");
}

function total_bazar_cost($conn,$table,$mess_name,$month,$target_bazar){//table=bazar_management
    $sql = $conn->query("UPDATE $table SET total_bazar= total_bazar+$target_bazar WHERE mess_name='". $mess_name."'AND month='". $month."'");   
}

function total_other_cost($conn,$table,$mess_name,$month,$target_cost){//table=bazar_management
    $sql = $conn->query("UPDATE $table SET total_other= total_other+$target_cost WHERE mess_name='". $mess_name."'AND month='". $month."'");   
}

function get_total_bazar_cost($conn,$table,$mess_name,$month){
    $sql = $conn->query("SELECT * FROM ". $table." WHERE mess_name='". $mess_name."'AND month='". $month."'");
    if ($sql->num_rows > 0) {
        while($row = $sql->fetch_assoc()) {
           return $row["total_bazar"];
        }
    }
}

function meal_calculation($conn,$total_bazar,$total_ratio,$target_ratio,$target_total_meal){
        $avg_cost = ($total_bazar/$total_ratio);
        $target_meal_total = ($avg_cost*$target_ratio);
        return ($target_meal_total/$target_total_meal);
    }

function InsertBazar($conn,$table,$mess_name,$bazar_date,$bazar_month,$assigned_person,$bazar_cost){
    $sql = "INSERT INTO $table (mess_name, bazar_date, bazar_month, assigned_person, bazar_cost) VALUES ('$mess_name','$bazar_date','$bazar_month','$assigned_person',$bazar_cost)";
        
        if ($conn->query($sql) === TRUE) {
            $total_bazar = $this->total_bazar_cost($conn,"bazar_management",$mess_name,$bazar_month,$bazar_cost);
            $this->total_bazar_cost($conn,"meal_details",$mess_name,$bazar_month,$bazar_cost);
            $meal_details=$this->getMealDetails($conn,"meal_details",$mess_name,$bazar_month);

            $breakfast_meal_rate=0;
            $lunch_meal_rate=0;
            $dinner_meal_rate=0;
            if ($meal_details->num_rows > 0) {
                while($row = $meal_details->fetch_assoc()) {
                    $total_ratio = $row["total_ratio"];
                    $breakfast_meal = $row["breakfast_meal"];
                    $lunch_meal = $row["lunch_meal"];
                    $dinner_meal = $row["dinner_meal"];
                    $breakfast_ratio = $row["breakfast_ratio"];
                    $lunch_ratio = $row["lunch_ratio"];
                    $dinner_ratio = $row["dinner_ratio"];

                    $breakfast_meal_rate = $this->meal_calculation($conn,$total_bazar,$total_ratio,$breakfast_ratio,$breakfast_meal);
                    $lunch_meal_rate     = $this->meal_calculation($conn,$total_bazar,$total_ratio,$lunch_ratio,$lunch_meal);
                    $dinner_meal_rate    = $this->meal_calculation($conn,$total_bazar,$total_ratio,$dinner_ratio,$dinner_meal);
                }
            
            }
            $this->setMealCosts($conn,"meal_details",$mess_name,$breakfast_meal_rate,$lunch_meal_rate,$dinner_meal_rate,$bazar_month);

            $result= TRUE;
        } else {
         $result= FALSE ;
        }
        return $result ;
}


function UpdateBazar($conn,$table,$mess_name,$bazar_date,$bazar_month,$assigned_person,$bazar_cost){
        $sql = $conn->query("UPDATE $table SET bazar_date= '$bazar_date', bazar_month= '$bazar_month', assigned_person= '$assigned_person', bazar_cost= $bazar_cost WHERE mess_name='". $mess_name."'");
//total_bazar_cost

        if ($conn->query($sql) === TRUE) {
         $result= TRUE;
        } else {
         $result= FALSE ;
        }
        return $result ;
}



//**************************** Other Cost *****************************
function InsertOtherCost($conn,$table,$mess_name,$bazar_date,$bazar_month,$assigned_person,$other_cost){
    $sql = "INSERT INTO $table (mess_name, bazar_date, bazar_month, assigned_person, other_cost) VALUES ('$mess_name','$bazar_date','$bazar_month','$assigned_person',$other_cost)";
        if ($conn->query($sql) === TRUE) {
            $total_bazar = $this->total_other_cost($conn,"bazar_management",$mess_name,$bazar_month,$other_cost);
            $result= TRUE;
        } else {
         $result= FALSE ;
        }
        return $result ;
}


//******************************* Utlities *************************************

function SetUtlities($conn,$table,$mess_name,$house_rent,$electricity_bill,$gas_bill,$wifi_bill,$other_bills){
    $total_utility = $house_rent + $electricity_bill + $gas_bill + $wifi_bill + $other_bills;
    $sql = "UPDATE $table SET house_rent= $house_rent, electricity_bill= $electricity_bill, gas_bill= $gas_bill, wifi_bill= $wifi_bill, other_bills = $other_bills, total_utility = $total_utility WHERE mess_name='$mess_name'";
        if ($conn->query($sql) === TRUE) {
            $result= TRUE;
        } else {
            $result= FALSE ;
        }
        return $result ;
}


//************************* Mess ******************************************

function ShowAllMember($conn,$table,$mess_name){
    $result = $conn->query("SELECT * FROM ". $table." WHERE mess_name='". $mess_name."'");
    return $result;
}

function checkPerStatusEmail($conn,$table,$status){
    $result = $conn->query("SELECT * FROM ". $table." WHERE validity='". $status."'");
    return $result;
}

function CheckMessName($conn,$table,$email) {
    $result = $conn->query("SELECT * FROM ". $table." WHERE email='". $email."'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           return $row["mess_name"];
        }
    }
}


function ValidMessMember($conn,$table,$mess_name,$email,$valid){
    $sql = "UPDATE $table SET validity= '$valid' WHERE mess_name='$mess_name' AND email='$email'";
        if ($conn->query($sql) === TRUE) {
            $result= TRUE;
        } else {
            $result= FALSE ;
        }
        return $result ;
}

function CheckValidity($conn,$table,$email){
    $result = $conn->query("SELECT * FROM ". $table." WHERE email='". $email."'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           return $row["validity"];
        }
    }   
}

function UpdateMessName($conn,$table,$mess_name,$email){
        $sql = "UPDATE $table SET mess_name= '$mess_name' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            $result= TRUE;
        } else {
            $result= FALSE ;
        }
        return $result ;
}

function UpdateToManager($conn,$table,$email,$type){
    $sql = "UPDATE $table SET type= '$type' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            $result= TRUE;
        } else {
            $result= FALSE ;
        }
        return $result ;

}







function CloseCon($conn)
{
    $conn -> close();
}


}
?>