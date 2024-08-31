<?php
	include('../control/perMessValidation.php');
    if(!isset($_SESSION['userId'])){
        header("location: /Mess_Meal_Management/view/Login.php");
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
	<title>Mess</title>
</head>
<body>
<header>
	<div class="row align-items-center bwg">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light logo">
				<a class="navbar-brand" href="#"><img src="../images/logo.png"  class="img-fluid% py-0"></a>
  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  				</button>
  				<div class="collapse navbar-collapse" id="navbarSupportedContent">
    				<ul class="navbar-nav ml-auto">
				     	<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          My Mess</a>
				        	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          		<a class="dropdown-item" href="#">All meals today</a>
				          		<a class="dropdown-item" href="#">Meals Details</a>
				          		<a class="dropdown-item" href="#">Cost Details</a>
				         		<a class="dropdown-item" href="#">Bazar Details</a>
				         		<a class="dropdown-item" href="#">Member Details</a>
				            </div>
				     	</li>
				     	<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Manage costs</a>
				        	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          		<a class="dropdown-item" href="#">Add bazar cost</a>
				          		<a class="dropdown-item" href="#">Update bazar cost</a>
				         		<a class="dropdown-item" href="#">Add other cost</a>
				         		<a class="dropdown-item" href="#">Update other cost</a>
				            </div>
				     	</li>
    					<li class="nav-item"><a href="/Mess_Meal_Management/view/Dashboard.php" class="nav-link">Dashboard</a></li>
      				</ul>			
				</div>
			</nav>
		</div>
	</div>
	<hr>
</header>
<section class="information">
	<div class="container justify-content-center feature">
		<div class="row justify-content-center">
			<div class="col-lg-5 col-sm-12 text-center" id="mealManagement">
  				<h6><b>Today :</b><p id="today_date_time"></p></h6>
  			</div>
			<div class="col-lg-7 col-sm-12 text-center" id="mealManagement">
				<form action='' method='POST' class='signUpForm loginForm inputInline ratioInput'>
					<div class="row justify-content-center">
						<label>Today's meals :</label>
						<?php 
							if($meal_per_day=="2"){  ?>
								<input type="number" name='lunch' id='lunch' placeholder='Lunch'>
								<p> : </p>
								<input type="number" name='dinner' id='dinner' placeholder='Dinner'>
						<?php 
							}
							else if($meal_per_day=="3"){ ?>
								<input type="number" name='breakfast' id='breakfast' placeholder='Breakfast'>
								<p> : </p>
								<input type="number" name='lunch' id='lunch' placeholder='Lunch'>
								<p> : </p>
								<input type="number" name='dinner' id='dinner' placeholder='Dinner'>
							<?php } ?>
					</div>
					<div class="row justify-content-center mt-3">
						<input type="submit" class="button submitButton" name="perMealUpdate" value="Update">
					</div>
				</form>
					<?php 
						if($meal_per_day=="2"){  ?>
							<p class="justify-content-center text-center">Note: Meal is by default set 1:1. Only change if you have more than 1 meal. Put 0 if you don't want to give meal . To konw more about today's meals <a href="#">click here</a></p>
						<?php 
						}
						else if($meal_per_day=="3"){ ?>		
						<p class="justify-content-center text-center">Note: Meal is by default set 1:1:1. Only change if you have more than 1 meal. Put 0 if you don't want to give meal . To konw more about today's meals <a href="#">click here</a></p>
					<?php } ?>
  				 </p></h6>
  			</div>
  		</div>
  	</div>
  	<hr>
</section>
<section class="bazar_correction">
	<div class="container justify-content-center feature">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-sm-12 text-center justify-content-center">
 				<div class="details bazar_management">
	 				<h4><b>Add Bazar</b></h4>
	 				<div class="manager-bazar"> 
 						<form action='' method='POST' class='signUpForm loginForm extra_Bazar'>
 							<div class="row justify-content-center mb-3">
 									<label>Date : </label><input type="number" name="bazar_day" id="bazar_day" placeholder="Day" max="31" min="1" ><label>/</label>
 									<input type="text" name="bazar_month" id="bazar_month" readonly ><label>/</label>
 									<input type="text" name="bazar_year" id="bazar_year" readonly ><br>
 							</div>
 								<label>Bazar </label>
 								<input type="number" name="bazar_cost" id="bazar_cost" >
 								<input type="submit" class="button submitButton" name="extra_bazar" value="Add">
 						</form>
	 				</div>
	 			</div>
			</div>
			<div class="col-lg-6 col-sm-12 text-center justify-content-center">
				<div class="details bazar_management">
					<h4><b>Add Other Cost</b></h4>
	 				<div class="manager-bazar ">
 						<form action='' method='POST' class='signUpForm loginForm extra_Bazar'>
 							<div class="row justify-content-center mb-3">
 									<label>Date : </label><input type="number" name="other_cost_day" id="other_cost_day" placeholder="Day" max="31" min="1" ><label>/</label>
 									<input type="text" name="other_cost_month" id="other_cost_month" readonly ><label>/</label>
 									<input type="text" name="other_cost_year" id="other_cost_year" readonly ><br>
 							</div>
 								<label>Other cost</label>
 								<input type="number" name="other_cost" id="other_cost" >
 								<input type="submit" class="button submitButton" name="other_cost_submit" value="Add">
 						</form>
	 				</div>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 text-center">
 				//Assign Bazar
			</div>
			<div class="col-lg-2 col-sm-6 text-center">
 				//Approve bazar cost of other
			</div>
			<div class="col-lg-2 col-sm-6 text-center">
				//Modify if any wrong
				Edit bazar, other cost, bazar assigned, utilities.
				As WT project
			</div>
		</div>
	</div>	
</section>
   	 <script src="../js/all.min.js"> </script>
    <script src="../js/jquery-3.4.1.slim.min.js"> </script>
   <script src="../js/bootstrap.min.js"> </script>
  <script type="text/javascript" src="../js/Homepage.js"> </script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
</html>