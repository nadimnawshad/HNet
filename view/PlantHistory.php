<?php 
	include('../control/historyValidation.php');
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
	<title>History</title>
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
<section class="text-center ">
	<div class="container">
		<div class="history_section mt-4 mb-4">
			<h5>History List</h5><br>
	    	<?php
		        if ($userQuery->num_rows > 0) {
		        	echo "<table><thead><tr><th>Plant Name</th><th>Planting Date</th></tr></thead>
		                  <tbody id='data'>";
		        	while($row = $userQuery->fetch_assoc()) {
		        	   echo "<tr><td>".$row["plant_name"]."</td><td>".$row["planting_date"]."</td>";
		        	}
		        	echo "</tbody></table>";
		        }            
		        else {
		          echo "0 results";
		        }
	    	?>
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