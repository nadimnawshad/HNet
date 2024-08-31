<?php
    include('../control/SignUpValidation.php');
    if(isset($_SESSION['userId'])){
        header("location: /Mess_Meal_Management/view/Dashboard.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="icon" type="text/css" href="../images/logo.png">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<title>SignUp</title>
</head>
<body>
<section class="banner">
	<div id="popUp" class="popUp">
            <div class="popUp-content">
              	<p id="display">
              		<div class='popUp-form'>
                        <div class='signUp-form'>
                            <span class="cancel" onclick="location='/Mess_Meal_Management/view/Homepage.php'"><i class="fa-solid fa-xmark"></i></span>
                            <div class='top-logo justify-content-center text-center'>
                                <a href='Homepage.php'><img src='../images/logo.png'></a>
                                <br>
                                <p>It just take a few minutes</p>
                            </div>
                            <p class="errorMsg"><?php echo $error; ?></p>
                            <form action='../control/SignUpValidation.php' method='POST' class='signUpForm'>
                                <label>* First Name : </label><br>
                                <input type='text' name='firstName' id='firstName'  placeholder='First name' >
                                <p id='firstNameValidation' class='errorMsg'></p>
                     
                                <label>* Sure Name : </label><br>
                                <input type='text' name='sureName' id='sureName' placeholder='Sure name' >
                                <p id='sureNameValidation' class='errorMsg'></p>

                                <label>* Phone Number : </label><br>
                                <input type='text' name='phone' id='phone' placeholder='Phone Number' >
                                <p id='phoneValidation' class='errorMsg'></p>

                                <label>* Email : </label><br>
                                <input type='text' name='email' id='email' placeholder='Email Address'>
                                <p id='emailValidation' class='errorMsg'></p>

                                <label>* Password : </label><br>
                                <input type="password" name="userPass" id="userPass" placeholder="Enter a new password" >
                                <p id="passwordValidation" class="errorMsg"></p>

                                <label>* Re-type Password : </label><br>
                                <input type='password' name='repassword' id='repassword' placeholder='Retype Password' >
                                <p id='rePasswordValidation' class='errorMsg'></p>
                                <div>
                                    <label>* Gender : </label>
                                    <span class="genderSelection">
                                        <input type='radio' id='Male' name='gender' value='Male'>
                                        <label for='Male'>Male</label>
                                    </span>
                                    <span class="genderSelection">
                                        <input type='radio' id='Female' name='gender' value='Female'>
                                        <label for='Female'>Female</label>
                                    </span>
                                    <span class="genderSelection">
                                        <input type='radio' id='Custom' name='gender' value='Custom'>
                                        <label for='Custom'>Custom</label>
                                    </span>
                                </div>
                                <p id='genderValidation' class='errorMsg'></p>

                                <label>*Present Address</label><br>
                                <textarea id='address' name='address' placeholder='Present address' style='height:auto;'></textarea>
                                <p id='addressValidation' class='errorMsg'></p>
                                <div class="signUpFooter">                
                                    <br><p>By clicking SignUp, you agree to our <a href='#'>terms and policies</a> and <a href='#'> cookies policies</a>.</p> <br>
                                    <input type="submit" class="button submitButton" name="SignUp" value="SignUp" onclick ="return signUpValidation()"><br>
                                    <p class="loginLink" onclick="location='/Mess_Meal_Management/view/Login.php'" >Already have an account? Login</p> 
                                </div> 
                            </form>
                        </div>
                    </div>   
              	</p>
            </div>
         </div>
	</div>
</section>
   	 <script src="../js/all.min.js"> </script>
    <script src="../js/jquery-3.4.1.slim.min.js"> </script>
   <script src="../js/bootstrap.min.js"> </script>
  <script type="text/javascript" src="../js/Homepage.js"> </script>
</body>
</html>