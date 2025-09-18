<?php
$nav_index=$nav_about=$nav_service=$nav_emp=$nav_resource=$nav_news=$nav_announ=$nav_contact="";
$conn=mysqli_connect("localhost","root","","poessa") or die("connection error");//create connection
include('backgroundinfo.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Video|Private Organization Employee's Social Security Administration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
              <h1 class="mb-2 bread"><span>Video Resource</span></h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>resource<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
      </section>
    
      <section class="ftco-section">
    <div class="container " >
    <div class="row">
    <div class="col-md-8 ftco-animate">
    <div class="row">
           <?php 
           $found=0;
           if(isset($_POST['search'])){
            $title=$_POST['searchtitle'];
            $sql2="SELECT * from media where M_type like 'video%' and M_title like '%$title%'";
            }
            else{
           $sql2="SELECT * from media where M_type like 'video%'";}
             $result2=mysqli_query($conn,$sql2);
            while($row1=mysqli_fetch_array($result2)){
              if($row1['action']!='trash'){
                $found=1;
                ?>
              
        <div class="col-md-6 col-lg-6 ftco-animate">
        <div class="blog-entry">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title text-primary"><?php echo $row1['M_title']; ?></h6>
              <h6 ><strong><i class="fa fa-file"></i> :</strong><?php echo $row1['M_type']; ?></h6>
              <h6><strong><i class="fa fa-database"></i> :</strong><?php echo $row1['M_size']; ?>.byte</h6>
              <h6><strong><i class="fa fa-calendar"></i> :</strong><?php echo $row1['date']; ?></h6>
              <a href="resource/<?php echo $row1['M_fullname']; ?>"  class="btn btn-primary">open</a>
              <a href="resource/<?php echo $row1['M_fullname']; ?>" download class="btn btn-primary ml-5"><i class="fa fa-download"></i></a>
            </div>
          </div>
        </div>
      </div><?php }}
      if($found==0){
      ?>
       <div class="col-md-6 col-lg-9 ftco-animate">
        <div class="blog-entry">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">Document not found</h1>
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
                    <form  action="video.php?pagename=searched for" method="post">
                     <div class="input-group">
                    <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                    <span class="input-group-btn">
                    <button class="btn btn-secondary" name="search" type="submit">Go!</button>
                    </span>
                    </form>
                </div>
              </div>
                </div>
           <div class="card my-4">
                <h5 class="card-header">Recent document</h5>
                  <div class="card-body">
                   <ul class="mb-0">
                    <?php
                    $cnt=0;
                    $query=mysqli_query($conn,"SELECT * from media where  M_type like 'video%'  ORDER BY M_id DESC ");
                    while ($row2=mysqli_fetch_array($query)) {
                      if($row2['action']!='trash'){
                        $found=1;
                      if($cnt<6){
                    ?>
                    <li>
                    <a href="resource/<?php echo $row2['M_fullname']; ?>"  ><?php echo htmlentities($row2['M_title']);?></a>
                 </li>
                  <?php } $cnt++; }} ?>
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
                    <li><a href="media.php">gallery</a></li>
                    <li><a href="video.php">video</a></li>
                    <li><a href="document.php?pagename=proclamation">proclamation</a></li>
                    <li><a href="document.php?pagename=manual">manual</a></li>
                    <li><a href="document.php?pagename=Rules and Regulation">Rules & Regulation</a></li>
                    <li><a href="document.php?pagename=Plan and Reports">Plan & Reports</a></li>
                  </ul>
                  </div>
                </div>
                
             </div>
           </div>
        </div>
      </section>
        
    <?php include('include/footer.php');?>
</body>
</html>


