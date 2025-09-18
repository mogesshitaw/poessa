<?php
$nav_index=$nav_about=$nav_service=$nav_emp=$nav_resource=$nav_news=$nav_announ=$nav_contact="";
include('backgroundinfo.php');
$date=date('M d /Y');
$time=date('h:i A');
 $foundemail='';
 $found=0;
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
    $r_from="contact";
    $sql="INSERT into comment(fullname,email,text,category,owner,visible,date,time) values('$_POST[name]','$_POST[email]','$_POST[comment]','$r_from','sender','unseen','$date','$time')";
       if(!mysqli_query($conn,$sql)){
      $error="error please try again";
      }else{
        echo "<script> alert('message sent');</script>";
        echo '<meta content="0;contact.php" http-equiv="refresh" />';
      }}
      else{
        echo "<script> alert('message is not sent your email is not matched  from your name');</script>";
        echo '<meta content="0;contact.php" http-equiv="refresh" />';
      }
  $r_from="contact";
  $sql="INSERT into comment(fullname,email,text,category,owner,visible,date,time) values('$_POST[name]','$_POST[email]','$_POST[comment]','$r_from','sender','unseen','$date','$time')";
  if(!mysqli_query($conn,$sql)){
    $error="error please try again";
    }else{
      echo "<script> alert('message sent');</script>";
      echo '<meta content="0;contact.php" http-equiv="refresh" />';
    }
  
  }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Private Organization Employee's Social Security Administration</title>
  <meta charset="utf-8">
  <?php
  $nav_contact="active";
  include('include/links.html');?>
<style>
   section{
      
    background-color:<?php echo $color; ?>;
    }
</style>
</head>
<body>
    <?php include('include/header.php');?>
    <section class="hero-wrap hero-wrap-2" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)),url('vacancyfile/<?php echo $image; ?>');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-2 bread">Contact Us</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact us<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
      </section>
  
      <section class="ftco-section contact-section">
        <div class="container">
          <div class="row d-flex mb-5 contact-info">
            <div class="col-md-3 d-flex">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <h3 class="mb-4">Address</h3>
                  <p><?php echo $place;?></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <h3 class="mb-4">Contact Number</h3>
                  <p><a href="tel://1234567920"><?php echo $phone;?></a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <h3 class="mb-4">Email Address</h3>
                  <p><a href="mailto:info@yoursite.com"><?php echo $email;?></a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <h3 class="mb-4">Website</h3>
                  <p><a href="#"><?php echo $weblink;?></a></p>
                </div>
            </div>
          </div>
        </div>
      </section>
          
          <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
              <div class="container">
                  <div class="row d-flex align-items-stretch no-gutters">
                      <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
                          <form action="contact.php" method="post">
                <div class="form-group">
                  <input type="text" name="name"class="form-control" placeholder="Your full Name">
                </div>
                <div class="form-group">
                  <input type="text" name="email"class="form-control" placeholder="Your your valid Email">
                </div>
              
                <div class="form-group">
                  <textarea name="comment" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Send Message" name="submit" class="btn btn-primary py-3 px-5">
                </div>
              </form>
              </div>
                      <div class="col-md-6 d-flex align-items-stretch">
                        <div class="ratio ratio-16x9">
                          <h1></h1>
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3340.191212789077!2d38.8012546!3d9.017879499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b85ed5eb105dd%3A0xbed9eb5b9c659a37!2sPrivate%20Organization%20Employees&#39;%20Social%20Security%20Administration%20-%20Head%20Office%20-%20Ethiopia!5e1!3m2!1sam!2set!4v1721888623404!5m2!1sam!2set" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                      </div>
                  </div>
              </div>
          </section>
          <?php include('include/footer.php');?>
      </body>
      </html>
      
      
      