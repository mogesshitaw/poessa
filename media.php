<?php
$nav_index=$nav_about=$nav_service=$nav_emp=$nav_resource=$nav_news=$nav_announ=$nav_contact="";
include('backgroundinfo.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document|Private Organization Employee's Social Security Administration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    $nav_resource="active";
    include('include/links.html');?>
    <style>
       section{
      background-color:<?php echo $color; ?>;
    }
    .card{
      background-color:#dde3e9;
    }
    </style>

</head>
<body>
    <?php include('include/header.php');?>

    <section class="hero-wrap hero-wrap-2" style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)), url('vacancyfile/<?php echo $image; ?>');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-2 bread"><span> Gallery resource</span></h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Document<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
      </section>
    
      <section class="ftco-section">
        <div class="container ">
            <div class="row">
           <?php
           $found=0;
            $sql2="SELECT * from media where M_type like 'image%' ";
             $result2=mysqli_query($conn,$sql2);
            while($row1=mysqli_fetch_array($result2)){
              if($row1['action']!='trash'){
                $found=1;
              ?>
        <div class="col-md-6 col-lg-6 ftco-animate">
        <div class="blog-entry">
          <div class="card">
            <div class="card-body">
             <img class="img-fluid rounded" src="<?php echo "resource/".$row1['M_fullname'];?>" alt="<?php echo htmlentities($row1['M_title']);?>"><br>
              <span class="card-title text-primary"><?php echo $row1['M_title']; ?></span>
              <p><span ><strong><i class="fa fa-file"></i> :</strong><?php echo $row1['M_type']; ?></span>
              <span><strong><i class="fa fa-database"></i> :</strong><?php echo $row1['M_size']; ?>.byte</span>
              <span><strong><i class="fa fa-calendar"></i> :</strong><?php echo $row1['date']; ?></span></p>
              <a href="resource/<?php echo $row1['M_fullname']; ?>"  class="btn btn-primary float-left">View now</a>
              <a href="resource/<?php echo $row1['M_fullname']; ?>" download class="btn btn-primary float-right ml-5">Download</a>
            </div>
          </div>
        </div>
      </div><?php }}
      if($found==0){
      ?>
       <div class="col-md-9 ftco-animate">
        <div class="blog-entry">
          <div class="card">
            <div class="card-body">
              <h1>media not found</h1>
            </div>
          </div>
        </div>
      </div><?php }?>
    </div>
         
        </div>
      </section>
        
    <?php include('include/footer.php');?>
</body>
</html>


