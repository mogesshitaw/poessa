<?php
$nav_index=$nav_about=$nav_service=$nav_emp=$nav_resource=$nav_news=$nav_announ=$nav_contact="";
include('backgroundinfo.php');
$atype="";
if(isset($_GET['A_Type'])){
  $atype=$_GET['A_Type'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Annoucement |Private Organization Employee's Social Security Administration</title>
  <meta charset="utf-8">
  <?php 
  $nav_announ="active";
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
    <section class="hero-wrap hero-wrap-2" style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)),url('vacancyfile/<?php echo $image; ?>');">
      
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <?php
              
              if($atype ==''){
               echo '<h1 class="mb-2 bread" ><span style="text-transform:capitalize;">Anouncement</span></h1>';
               echo ' <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a>Anouncement<i class="ion-ios-arrow-forward"></i></span></p>';
              }
              else{?>
              <h1 class="mb-2 bread" ><span style="text-transform:capitalize;"><?php echo $atype;?></span></h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a><?php echo $atype;?><i class="ion-ios-arrow-forward"></i></span></p>
              <?php }?>
             
            </div>
          </div>
        </div>
      </section>
<section  class="ftco-section">  
<div class="container mt-5">
    <div class="row ">
    <div class="col-md-8 ftco-animate">
    <div class="row">
    <?php
     $found=0;
     if(isset($_POST['search'])){
      $title=$_POST['searchtitle']; 
      $sql2="SELECT * from ANNOUNCEMENT where A_title like '%$title%'";
      $atype=$_GET['type'];
       }
    else{
      if($atype !=''){
        $sql2="SELECT * from ANNOUNCEMENT where A_type='$atype'";
      }
      else{
         $sql2="SELECT * from ANNOUNCEMENT";
      }
    }
    $result2=mysqli_query($conn,$sql2);
    while($row1=mysqli_fetch_array($result2)){
      $found=1;
    ?>

<div class="col-md-6 col-lg-6 ftco-animate">
      <div class="blog-entry">
        <div class="card  ">
          <div class="card-body">
          <h6 class="card-title text-primary"><?php echo $row1['A_title']; ?></h6>
            <h6><strong><i class="fa fa-calendar"></i> </strong><?php echo $row1['SENT_DATE']; ?></h6>
            <h6><strong><i class="fa fa-list-alt"></i> </strong><?php echo $row1['A_type']; ?></h6>
            <a href="announce_view.php?A_id=<?php echo $row1['A_id'];?>&&A_type=<?php echo $atype;?>" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
    </div>
              <?php }
            if($found==0){
              ?>
              <div class="col-md-6 col-lg-9 ftco-animate">
                <div class="blog-entry">
                  <div class="card">
                    <div class="card-body">
                      <h1 class="card-title">posted not found</h1>
                    </div>
                  </div>
                </div>
              </div><?php }?>
            </div>
          </div>
          <div class="col-md-4 mt-0 ftco-animate">
                <!-- Search Widget -->
              <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <form  action="announcement.php?A_Type=Searched for announcement &&type=<?php echo $atype;?>" method="post">
                     <div class="input-group">
                    <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                    <span class="input-group-btn">
                        <button class="btn btn-secondary"name="search" type="submit">Go!</button>
                    </span>
                    </form>
                </div>
              </div>
                </div>
           <div class="card my-4">
                <h5 class="card-header">Recent <?php echo $atype; ?></h5>
                  <div class="card-body">
                   <ul class="mb-0">
                    <?php

                    $query=mysqli_query($conn,"SELECT * from announcement where A_type='$atype' ORDER BY A_id DESC ");
                    while ($row=mysqli_fetch_array($query)) {
                    ?>
                    <li>
                 <a href="announce_view.php?A_id=<?php echo htmlentities($row['A_id'])?>&&A_type=<?php echo $atype;?>"><?php echo htmlentities($row['A_title']);?></a>
                 </li>
                  <?php } ?>
                </ul>
                  </div>
                </div>
                <!-- Side Widget -->
              <div class="card my-4">
                <h5 class="card-header">View More</h5>
                <div class="card-body">
                  <ul class="mb-0">
                    <li><a href="announcement.php?A_Type=bid">bid</a></li>
                    <li><a href="announcement.php?A_Type=vacancy">vacancy</a></li>
                    <li><a href="document.php?pagename=All Document">Document</a></li>
                    <li><a href="media.php">gallery</a></li>
                    <li><a href="video.php">video</a></li>
                  </ul>
                    </div>
                  </div>
             </div>
         </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
      </section>
    
   <?php include('include/footer.php');?>
</body>
</html>


