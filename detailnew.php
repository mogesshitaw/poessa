<?php
include('include/connection.php');
$nav_index=$nav_about=$nav_service=$nav_emp=$nav_resource=$nav_news=$nav_announ=$nav_contact="";
include('backgroundinfo.php');
$nid='';
$date=date('M d\,Y');
$time=date('h:i A');
$found=0;
$foundemail='';
if(isset($_GET['nid'])){
$nid=$_GET['nid'];}
$sql2="select * from news where nid='$nid'";
     $result2=mysqli_query($conn,$sql2);
     $row1=mysqli_fetch_array($result2);

if(isset($_POST['submit'])){
  $query=mysqli_query($conn,"SELECT * from comment");
  while($row=mysqli_fetch_array($query)){
    $foundemail=$row['email'];
    if(($row['email'] == $_POST['email'] && $row['fullname'] == $_POST['name']) || ($row['email'] != $_POST['email'] && $row['fullname'] == $_POST['name']) || ($row['email'] != $_POST['email'] && $row['fullname'] != $_POST['name'])){
    $found=1;
    }
    else{
      $found=0;
      break;
    }
  }
  if($found != 0 || $foundemail==''){
    $r_from="news";
    $sql="INSERT into comment(fullname,email,text,category,owner,visible,date,time) values('$_POST[name]','$_POST[email]','$_POST[comment]','$r_from','sender','unseen','$date','$time')";
       if(!mysqli_query($conn,$sql)){
      $error="error please try again";
      }else{
        echo "<script> alert('message sent');</script>";
        echo '<meta content="0;detailnew.php?nid='.$nid.'" http-equiv="refresh" />';
      }}
      else{
        echo "<script> alert('message is not sent your email is not matched  from your name');</script>";
        echo '<meta content="0;detailnew.php?nid='.$nid.'" http-equiv="refresh" />';
      }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Private Organization Employee's Social Security Administration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $nav_news="active";
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
    <section class="hero-wrap hero-wrap-2" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)),url('vacancyfile/<?php echo $image; ?>');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-2 bread">News</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>News  <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
      </section>
  
      <section class="ftco-section ">
    <div class="container-fluid">
     <div class="row">
        <div class="col-sm-12 col-md-8">
        <?php
    $sql2="select * from news where nid='$nid'";
     $result2=mysqli_query($conn,$sql2);
     $row1=mysqli_fetch_array($result2);
      
      ?>
      <div class="card mb-4">
      <div class="card-body">
        <h2 class="card-title " ><?php echo htmlentities($row1['title']);?></h2>
       <em class="text-muted"> <i class="fa fa-calendar"></i>  </b><?php echo htmlentities($row1['date']);?>    <i class="fa fa-id-card"></i>  <b><?php echo htmlentities($row1['username']);?></b>  </em>
         
          <img class="img-fluid rounded" src="<?php echo "postimage/".$row1['featuredimage'];?>" alt="<?php echo htmlentities($row1['title']);?>">
          <p class="card-text"><?php 
           $pt=$row1['content'];
             echo  (substr($pt,0));?></p>
              <?php if($row1['updationDate']!=''){?>
                <b>Last Updated by </b> <?php echo htmlentities($row1['lastupdateusername']);?> <i class="fa fa-calendar"></i> </b><?php echo htmlentities($row1['updationDate']);}?></p>         

            </div>
            </div>
            </div>
            <!-- Sidebar Widgets Column -->
 <?php include('include/sidbar.php');?>
            </div>
<!---Comment Section --->
            <?php 
            $query=mysqli_query($conn,"SELECT * from news");
            $row=mysqli_fetch_array($query) or die ('mysqli_error');
            if($row['permission']=='Public'){
            ?>
 <div class="row" >
   <div class="col-md-8">
<div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form action="detailnew.php?nid=<?php echo $nid;?>" method="post">
      <input type="hidden" name="csrftoken" value="<?php  ?>" />
 <div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
</div>

 <div class="form-group">
 <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
 </div>
                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Send message </button>
              </form>
            </div>
          </div>
          </div><?php } ?>
  <!---Comment Display Section --->
    </section>

    
    <?php include('include/footer.php');?>
</body>
</html>


