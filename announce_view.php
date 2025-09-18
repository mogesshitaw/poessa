<?php
$nav_index=$nav_about=$nav_service=$nav_emp=$nav_resource=$nav_news=$nav_announ=$nav_contact="";
$A_id=$type="";
$conn=mysqli_connect("localhost","root","","poessa") or die("connection error");//create connection
include('backgroundinfo.php');
if(isset($_GET['A_id']) && isset($_GET['A_type'])){
    $A_id=$_GET['A_id'];
    $type=$_GET['A_type'];
}
$date=date('M d /Y');
$time=date('h:i A');
$found=0;
$foundemail='';
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
  $r_from="announce";
  $sql="INSERT into comment(fullname,email,text,category,owner,visible,date,time) values('$_POST[name]','$_POST[email]','$_POST[comment]','$r_from','sender','unseen','$date','$time')";
     if(!mysqli_query($conn,$sql)){
    $error="error please try again";
    }else{
      echo "<script> alert('message sent');</script>";
      echo '<meta content="0;announce_view.php?A_id='.$A_id.'" http-equiv="refresh" />';
    }}
    else{
      echo "<script> alert('message is not sent your email is not matched  from your name');</script>";
      echo '<meta content="0;announce_view.php?A_id='.$A_id.'" http-equiv="refresh" />';
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
    
    <section class="hero-wrap hero-wrap-2" style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)), url('vacancyfile/<?php echo $image; ?>');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-2 bread">Announcement view details</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Announcement<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
      </section>
  
      <section class="ftco-section ">
    <div class="container-fluid">
     <div class="row">
     <div class="col-md-8 mt-0 ftco-animate" >
     <?php
   
    $sql2="SELECT * from ANNOUNCEMENT where A_id='$A_id'";
  $result2=mysqli_query($conn,$sql2);
  while($row1=mysqli_fetch_array($result2)){

    ?>
            <div class="card announcement-card">
                <div class="announcement card-header text-white " style="text-align:center; height:30vh;background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)), url('<?php echo "vacancyfile/".$row1['featuredimage'];?>');">
                  <h2 class="card-title"><?php echo htmlentities($row1['A_title']);?></h2>
                   <em><i class="fa fa-id-card"></i> <b><?php echo htmlentities($row1['USER']);?> </b> <i class="fa fa-calendar"></i><?php echo htmlentities($row1['SENT_DATE']);?> </em>
                </div>
                <div class="card-body m-5">
            <p class="card-text"><?php
              $pt=$row1['A_content'];
             echo  (substr($pt,0));?></p>
             <?php if($row1['updationDate']!=''){?>
              <em><b>Last Updated by </b> <?php echo htmlentities($row1['lastupdateusername']);?> <i class="fa fa-calendar"></i> </b><?php echo htmlentities($row1['updationDate']);}?></em> <br>
                    <?php if($row1['File']!=''){ ?>
                      <a href="vacancyfile/<?php echo $row1['File'];?>"  class="btn  text-primary">view as pdf</a>
                      <a href="vacancyfile/<?php echo $row1['File'];?>" style="float:right;" download  class="btn btn-primary "><i class="fa fa-download"></i></a>
                    <?php }
                    else{
                      ?>
                      <a href="vacancyfile/<?php echo $row1['File'];?>" class="btn  disabled text-primary ">view as pdf</a>
                      <a href="vacancyfile/<?php echo $row1['File'];?>" style="float:right;"  class="btn btn-primary disabled"><i class="fa fa-download"></i></a>
                      <?php } ?>
                </div>
              </div>
              <?php }?>
            </div>
            
            
            <!-- Sidebar Widgets Column -->
        <div class="col-md-4 mt-0 ftco-animate">
                <!-- Search Widget -->
              <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <form  action="announcement.php?A_Type=Searched for announcement &&type=<?php echo $type;?>" method="post">
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
          
           <h5 class="card-header">Recent <?php echo $type; ?></h5>
                  <div class="card-body">
                   <ul class="mb-0">
                    <?php
                    
                    $query=mysqli_query($conn,"SELECT * from announcement where A_type='$type' ORDER BY A_id DESC ");
                    while ($row=mysqli_fetch_array($query)) {
                    ?>
                    <li>
                 <a href="announce_view.php?A_id=<?php echo htmlentities($row['A_id'])?>&&A_type=<?php echo $type;?>"><?php echo htmlentities($row['A_title']);?></a>
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
          
      <!-- /.row -->
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
              <form action="announce_view.php?A_id=<?php echo $A_id;?>" method="post">
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
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
            </div>
          </div>
          </div><?php } ?>
  <!---Comment Display Section --->
    </section>

    
    <?php include('include/footer.php');?>
</body>
</html>


