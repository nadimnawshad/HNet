<?php
	include('../control/dashboardManagement.php');
	if(!isset($_SESSION['userId'])){
        header("location: /hhgg/view/Login.php");
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
	<title>Dashboard</title>
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
							<li class="nav-item">
									<p class="nav-link">Welcome <?php echo $name ?>, </p>
							</li>
      				<li class="nav-item">
      						<a class="nav-link" href="Profile.php" title="Profile" role="button"><span><i class="fa-solid fa-address-card"></i></span></a>
      				</li>
      				<li class="nav-item " id="guide_box">
   								
      						<a class="nav-link"  title="Guide Box" role="button"><span><i class="fa-solid fa-comment-medical"></i></span></a> 
      						<?php if($numberOfNotification!=0){ echo '<span class="guide_box"><p class="guide_text_box">'.$numberOfNotification.' </p></span>';} ?>
      				</li>
      				<li class="nav-item">
      						<a class="nav-link" href="../control/Logout.php" title="Logout" role="button"><span><i class="fa-solid fa-right-from-bracket"></i></span></a>
      				</li>
      		</ul>			
				</div>
			</nav>
		</div>
	</div>
	<span class="line"></span>
</header>

<section class="notification_section" id="notification_section">
    <div id="popUp" class="popUp notification_popup">
        <div class="container "> 
            <div class="popUp-content notification_content">
                <span class="cancel" onclick="location='/HHGG/view/Dashboard.php'"><i class="fa-solid fa-xmark"></i></span>
                <div class='top-logo justify-content-center text-center'>
                    <a href='Homepage.php'><img src='../images/logo.png' class="logo-img"></a>
                    <br><br>
                    <a href='Notification.php' class="mt-5 mb-2">All Notifications</a><br><br>
                </div>
                	<?php 
						        if ($notification_query->num_rows > 0) {
						        	echo "<table id='notification_table' onmouseover='allNotificatioCheck()'><thead><tr colspan=2><th>Notifications</th></tr></thead>
						                  <tbody>";
						        	while($row = $notification_query->fetch_assoc()) {
						        	   echo "<tr><td>".$row["notifications"]."</td><td >".$row["time"]."</td></tr>";
						        	}
						        	echo "</tbody></table>";
						        }            
						        else {
						          echo "no notifications";
						        }
								?>
            </div>
        </div>
    </div>
</section>

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
<section class="header_information">
	<div class="container">
		<div class="row justify-content-center pb-5">
				<div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center feature dashboard-content">
  				<div class="details dashboardMenu" onclick="location='plantDetails.php'">
  					<h2><i class="fa-solid fa-seedling"></i></h2>
  					<h6><b>Plant Details</b></h6>
			    </div>
  			</div>
				<div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center feature dashboard-content">
  				<div class="details dashboardMenu" onclick="location='PlantHistory.php'">
  					<h2><i class="fa-solid fa-circle-info"></i></h2>
  					<h6><b>Plant History</b></h6>
			    </div>
  			</div>
				<div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center feature dashboard-content">
  				<div class="details dashboardMenu" onclick="location='diseaseDetection.php'">
  					<h2><i class="fa-solid fa-location-crosshairs"></i></h2>
  					<h6><b>Disease Detection</b></h6>
			    </div>
  			</div>
  			<div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center feature dashboard-content">
  				<div class="details dashboardMenu" onclick="location='diseaseHistory.php'">
  					<h2><i class="fa-solid fa-disease"></i></h2>
  					<h6><b>Disease History</b></h6>
			    </div>
  			</div>
  			<div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center feature dashboard-content">
  				<div class="details dashboardMenu" onclick="location='sensorData.php'">
  					<h2><i class="fa-solid fa-tower-broadcast"></i></h2>
  					<h6><b>Sensor Data</b></h6>
			    </div>
  			</div>
  			<div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center feature dashboard-content">
  				<div class="details dashboardMenu" onclick="location='sensorData.php'">
  					<h2><i class="fa-solid fa-clock-rotate-left"></i></h2>
  					<h6><b>Sensor's History</b></h6>
			    </div>
  			</div>
		</div>
	</div>
	<span class="line"></span>	
</section>
<footer class="footer_section mt-3 mb-3">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6 col-5 pt-2">
        <p>Copyritht 2022, HHGG</p>
      </div>
      <div class="col-sm-6 col-7">
        <ul class="nav justify-content-end">
          <li><a href="" class="button"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="" class="button"><i class="fab fa-twitter"></i></a></li>
          <li><a href="" class="button"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
   	 <script src="../js/all.min.js"> </script>
    <script src="../js/jquery-3.4.1.slim.min.js"> </script>
   <script src="../js/bootstrap.min.js"> </script>
  <script type="text/javascript" src="../js/script.js"> </script>
</body>
</html>