
<?php
$nav_index=$nav_about=$nav_service=$nav_emp=$nav_resource=$nav_news=$nav_announ=$nav_contact="";
include('backgroundinfo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Private Organization Employee's Social Security Administration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    $nav_index="active";
    include('include/links.html');?>
    <style>
        section{
     background-color:<?php echo $color;?>;
    }
    .overlay{
      
      background-color:black;
      }
      .overlay{
      background-color:rgba(0,0,0,0);
  }
  </style>
  
</head>
<body>
  <?php include('include/header.php');?>
    
    <section class="home-slider owl-carousel">
   
      <div class="slider-item " style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)),url('vacancyfile/<?php echo $image; ?>');">
      
        <div class="container box">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4"> Wellcome to our website!!<span> እንኳን ወደ ድህረ ገጻችን በደህና መጡ።</span></h1>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">Read More</a></p>
          </div>
        </div>
        </div>
      </div>
      <div class="slider-item" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)),url('vacancyfile/<?php echo $image2; ?>');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4">Federal Democratic Republic of Ethiopia <span>Private Organization Employee's Social Security administration</span></h1>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">Profile picture</a></p>
          </div>
        </div>
        </div>
      </div>
      <div class="slider-item" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 9, 0.5)),url('vacancyfile/<?php echo $image3; ?>');">
     
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4">የኢትዮጵያ  ፌደራላዊ ደሞክራሲያዊ ሪፐብሊክ <span> የግል ድርጅት ሰራተኞች ማህበራዊ ዋስትና አስተዳደር</span></h1>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">Profile picture</a></p>
          </div>
        </div>
        </div>
      </div>
    </section>
    <?php $sql2;
    $result2=mysqli_query($conn,"SELECT * from information order by id desc");
    $query=mysqli_fetch_array($result2);?>
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);" data-stellar-background-ratio="0.75">
    <div id="section-home" class="container">
      <div id=" section-home-inner" class="row row d-md-flex align-items-center">
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate one_third">
          <div class="block-18 services-builder style1">
            <div class="iconimage"><i class="fa fa-align-center fa-2x"></i></div>
            <div class="iconmain"><h3>ሠራተኞች</h3><p>የተመዘገቡ ሰራተኞች</p></div>
		              <div class="text">
		                <strong class="number" data-number="<?php echo $query['employee']; ?>">0</strong>
		              </div>
          </div>
        </div>
       
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate one_third">
          <div class="block-18 services-builder style1">
            <div class="iconimage"><i class="fa fa-align-center fa-2x"></i></div>
            <div class="iconmain"><h3>ድርጅቶች</h3><p>አሰሪ ድርጅቶች</p></div>
            <div class="text">
		                <strong class="number" data-number="<?php echo $query['organization']; ?>">0</strong>
		              </div>
          </div>
        </div>
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate one_third">
          <div class="block-18 services-builder style1">
            <div class="iconimage"><i class="fa fa-align-center fa-2x"></i></div>
            <div class="iconmain"><h3>ክፍያ</h3><p>የጡረታ ክፍያ</p></div>
            <div class="text">
		                <strong class="number" data-number="<?php echo $query['payment']; ?>">0</strong>
		              </div>
          </div>
        </div>
        <div class="clearboth"></div>
      </div>
    </div>
   
    
    </section>
    <section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Recent/</span> News</h2>
          </div>
        </div>
        <?php
    $int=1;
    $count=0;
    $sql2="select * from news";
     $result2=mysqli_query($conn,$sql2);
     while($row1=mysqli_fetch_array($result2)){
      if($count<6){
      if($int==4){
        $int=1;
      }
      if($int==1){
         echo "<div class='row'>";
      }
      ?>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
          <a href="postimage/<?php echo $row1['featuredimage'];?>" class="block-20 d-flex align-items-end" style="background-image: url('postimage/<?php echo $row1['featuredimage'];?>');">
                            
          </a>
          <div class="container mt-3 text">
            <h3 class="heading"><a href="detailnew.php?nid=<?php echo htmlentities($row1['nid'])?>" ><?php echo $row1['title'];?></a></h3>
            <a href="detailnew.php?nid=<?php echo $row1['nid'];?>" class="btn btn-primary" >Read more →</a>
          </div>
        </div>
      </div>

    
      <?php
    $int++;}
    $count++;

    }?>
     </div>
     </div>
      
    <h6 class="see"> <a href="news.php" >See More....</a></h6> 
		</section>
    <section class="ftco-section">
      <div class="container">
      <div class="row justify-content-center m-0 py-0">
            <div class="col-md-8 text-center heading-section ftco-animate">
              <h2 class="mt-0"><span>Announce</span>ment</h2>
            </div>
          </div>
        
    <div class="container mt-5">
    <div class="row ">
    
    <?php
    $cnt=0;
     $sql2="SELECT * from ANNOUNCEMENT";
    $result2=mysqli_query($conn,$sql2);
    while($row1=mysqli_fetch_array($result2)){
      if($cnt < 6){
    ?>
       <div class="col-md-4  ftco-animate" >
           <div class="card announcement-card my-5">
                <div class="announcement-header ">
                <h6 class="card-title"><?php echo $row1['A_title'];?></h6>
                </div>
                <div class="card-body">
                   
                    <p class="card-text">
                    </p>
                    <p><strong><i class="fa fa-calendar"></i></strong> <?php echo $row1['SENT_DATE'];?></p>
                    <p><strong><i class="fa fa-list-alt"></i></strong> <?php echo $row1['A_type'];?></p>
                    <a href="announce_view.php?A_id=<?php echo $row1['A_id'];?> && A_type=<?php echo $row1['A_type'];?>" class="btn btn-primary">Read More</a>
                </div>
              </div>
              </div>
              <?php }
            $cnt++;
            } ?>
            <!-- Add more announcements as needed -->
        </div>
    </div>
</div>
<h6 class="see"> <a href="announcement.php" >See More....</a></h6> 
		</section>
    <?php include('include/footer.php');?>
</body>
</html>


