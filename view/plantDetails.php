<?php 
	include('../control/plantDetailsValidation.php');
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
	<title>Plant Details</title>
</head>
<body>
<header>
	<nav class="navbar navbar-expand navbar-light logo">
		<div class="container">
				<a class="navbar-brand" href="#"><img src="../images/logo.png"  class="logo-img img-fluid  py-0"></a>
				<button class="navbar-toggler dashboard_menu_toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    				<span><i class="fa-solid fa-bars"></i></span>
  				</button>
  				
				<div class="collapse navbar-collapse justify-content-right" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto dashboard_header_menu">
						<li class="nav-item"><p class="nav-link">Welcome <?php echo $name ?>, </p></li>
      					<li class="nav-item">
							<div class="input-group">
							    <input type="text" class="form-control" id="search" placeholder="Search......">
							    <div class="input-group-append">
							      	<button class="search_button button search" type="button">
							        	<i class="fa fa-search"></i>
							      	</button>
							    </div>
							</div>
      					</li>
      					<li class="nav-item">
      						<a class="nav-link" href="Dashboard.php" title="Back" role="button"><span><i class="fa-solid fa-arrow-right"></i></span></a>
      					</li>
      				</ul>			
				</div>
			</nav>
		</div>
	</div>
	<span class="line"></span>
</header>
<section>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 col-sm-12 text-center time_date">
  				<h6><p id="today_date_time" class="time_date"></p></h6>
  			</div>
  		</div>
  	</div>
  	<span class="line"></span>
</section>
<section>
	<div class="container">
		<div class="row justify-content-center mt-4 mb-4 ">
			<div class="input-group text-center change_plant">
				<label>Your current cultivating Plant is : </label>
			    <input type="text" class="form-control" id="plant_name_textbox" placeholder="Plant name" value="<?php echo $plant_name ?>" readonly>
			    <button class="search_button button search" id="changePlantButton" type="button">Change</button>
			</div>
  		</div>
  	</div>
  	<span class="line"></span>
</section>
<section class="plant_list mt-5">
	<div class="container">
		<div class="row justify-content-left">
			<div class="plant_details plant_name col-lg-4 col-md-4 col-sm-6 col-6">
				<?php
				        if ($plant_info->num_rows > 0) {
				        	echo "<table id='plant_name_table' onmouseover='plantDetailsFind()'><thead><tr><th>Name</th></tr></thead>
				                  <tbody>";
				        	while($row = $plant_info->fetch_assoc()) {
				        	   echo "<tr><td>".$row["plant_name"]."</td></tr>";
				        	}
				        	echo "</tbody></table>";
				        }            
				        else {
				          echo "0 results";
				        }
				    ?>
			</div>
			<div class="plant_details col-lg-8 col-md-8 col-sm-6 col-6">
					<table>
						<thead>
							<tr><th>Description</th></tr>
						</thead>
				        <tbody>
				          	<tr><td id="plant_description"></td></tr>
				        </tbody>
				    </table>
			</div>	
		</div>			
	</div>
	<div class="span"></div>
</section>
<section class="new_cultivation" id="new_cultivation">
    <div id="popUp" class="popUp">
        <div class="container "> 
            <div class="popUp-content">
                <span class="cancel" onclick="location='/HHGG/view/plantDetails.php'"><i class="fa-solid fa-xmark"></i></span>
                <div class='top-logo justify-content-center text-center'>
                    <a href='Homepage.php'><img src='../images/logo.png' class="logo-img"></a>
                    <br>
            	</div>
	            <form action=" " method="POST" class="form_style loginForm" id="new_cultivation_Form">
					<label for="plant_option">*Choose Plant:</label>
					<select class="form-control" id="plant_option" name="plant_option_selection">
						<?php 
							if ($new_plant_option->num_rows > 0) {
						        while($row = $new_plant_option->fetch_assoc()) {
						        	echo '<option '.$row["plant_name"].' value="'.$row["plant_name"].'">'.$row["plant_name"].'</option>'; 
						        }
						    }
						?>
					</select>
					<input type="submit" class="button submitButton" name="add_plant" value="Add" onclick ="return null">
				</form>
			</div>
		</div>
	</div>
	<span class="line"></span>
</section>
   	 <script src="../js/all.min.js"> </script>
    <script src="../js/jquery-3.4.1.slim.min.js"> </script>
   <script src="../js/bootstrap.min.js"> </script>
  <script type="text/javascript" src="../js/script.js"> </script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
</html>