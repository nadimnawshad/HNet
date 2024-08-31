<?php 
    include('../control/diseaseDetectionValidation.php');
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
    <title>Disease Detection</title>
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
<section class="banner disease_test" id="disease_test">
    <div id="popUp" class="popUp">
        <div class="container "> 
            <div class="popUp-content">
                <span class="cancel" onclick="location='/HHGG/view/Dashboard.php'"><i class="fa-solid fa-arrow-right"></i></span>
                <div class='top-logo justify-content-center text-center'>
                    <a href='Homepage.php'><img src='../images/logo.png' class="logo-img"></a>
                    <br>
                </div>
                <form action="" enctype="multipart/form-data" method="POST" class="form_style loginForm" id="login_Form">
                    <label>* Upload Sample Images : </label><br>
                    <div class="file-upload-wrapper">
                        <div class="row dropBox-area">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div id="drag-area1" class="drag-area">
                                    <label for="inputDisease_image" id="disease_img1">
                                        <i class="fa fa-2x fa-camera"></i>
                                        <p>Image1</p>
                                        <input id="inputDisease_image"                      name="inputDisease_image_one"  type="file" accept="image/*" draggable="true" onchange="preview_image(event,'#imagePreview1')"/>
                                        <br/>
                                        <span class="diseas_leaf_img" id="imagePreview1"></span>
                                    </label>
                                </div>
                            </div>                                    
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div id="drag-area2" class="drag-area">
                                    <label for="inputDisease_image2" id="disease_img2">
                                        <i class="fa fa-2x fa-camera"></i>
                                        <p>Image2</p>
                                        <input id="inputDisease_image2" name="inputDisease_image_two" type="file" accept="image/*" draggable="true" onchange="preview_image(event,'#imagePreview2')"/>
                                        <br/>
                                        <span class="diseas_leaf_img" id="imagePreview2"></span>
                                    </label>
                                </div>
                                    
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div id="drag-area3" class="drag-area">
                                    <label for="inputDisease_image3" id="disease_img3">
                                        <i class="fa fa-2x fa-camera"></i>
                                        <p>Image3</p>
                                        <input id="inputDisease_image3" name="inputDisease_image_three" type="file" accept="image/*" draggable="true" onchange="preview_image(event,'#imagePreview3')"/>
                                        <br/>
                                        <span class="diseas_leaf_img" id="imagePreview3"></span>
                                    </label>
                                </div>
                                 <div id="display-image"></div>
                                    
                            </div>                            
                        </div>
                    </div>
                    
                    <label>*Description</label><br>
                    <textarea id='discription' name='discription' placeholder='Symptoms of the disease' style='height:auto;'></textarea>
                    <p id='discriptionValidation' class='errorMsg'></p>
                    
                    <input type="submit" class="button submitButton" name="submit" value="Submit" onclick ="return null"><br>
                </form>
            </div>
        </div>
    </div>
</section>
     <script src="../js/all.min.js"> </script>
    <script src="../js/jquery-3.4.1.slim.min.js"> </script>
   <script src="../js/bootstrap.min.js"> </script>
  <script type="text/javascript" src="../js/script.js"> </script>
</body>
</html>