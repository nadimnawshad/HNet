<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="text/css" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Detection Result</title>
</head>
<body>
<header>
  <nav class="navbar navbar-expand navbar-light logo">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="images/logo.png"  class="logo-img img-fluid  py-0"></a>
        <button class="navbar-toggler dashboard_menu_toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          
        <div class="collapse navbar-collapse justify-content-right" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto dashboard_header_menu">
            <li class="nav-item">
              <a class="nav-link" href="view/Dashboard.php" title="Back" role="button"><span><i class="fa-solid fa-arrow-right"></i></span></a>
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
<section class="disease_result">
    <br><br>
    <h4><b>Disease Name - </b><?php echo $disease_name ?></h4>
    <p><b>Disease Discription - </b> <?php echo $disease_discription ?></p>
    <p><b>Supplement - </b> <?php echo $supplement_name ?></p>
    <p><b>Possible Steps - </b> <?php echo $possible_steps ?></p>
</section>
<?php 
    include('model/db.php');

    $connection = new db();
    $conobj=$connection->OpenCon();
    $day = strval(date("d-M-Y"));
    $email= $connection->InsertPlantDiseaseHistory($conobj,"plant_disease_history",$_SESSION["userId"],$disease_name,$day);
?>
     <script src="js/all.min.js"> </script>
    <script src="js/jquery-3.4.1.slim.min.js"> </script>
   <script src="js/bootstrap.min.js"> </script>
  <script type="text/javascript" src="js/script.js"> </script>
</body>
</html>
