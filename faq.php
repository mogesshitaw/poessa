<?php
$nav_index=$nav_about=$nav_service=$nav_emp=$nav_resource=$nav_news=$nav_announ=$nav_FAQ="";
$conn=mysqli_connect("localhost","root","","poessa") or die("connection error");//create connection
include('backgroundinfo.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document|Private Organization Employee's Social Security Administration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    $nav_FAQ="active";
    include('include/links.html');?>
    <style>
       section{
      background-color:<?php echo $color; ?>;
    }
    </style>
</head>
<body>
    <?php include('include/header.php');?>

    <section class="hero-wrap hero-wrap-2" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)), url('vacancyfile/<?php echo $image; ?>');">
         <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-2 bread"><span>FAQ </span></h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>FAQ<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
      </section>
    
  <section class="ftco-section">
   <div class="container ">
          <h1></h1>
    
    </div>
        </div>
       </section>
    <?php include('include/footer.php');?>
</body>
</html>


