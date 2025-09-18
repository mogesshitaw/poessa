<?php
$nav_index=$nav_about=$nav_service=$nav_emp=$nav_resource=$nav_news=$nav_announ=$nav_contact="";
$image1=$image2=$image3=$image4=$title1=$title2=$title3=$title4=$date1=$date2=$date3=$date4=$nid1=$nid2=$nid3=$nid4="";
include('backgroundinfo.php');
$search="";
if(isset($_POST['submit'])){
$search=$_GET['search'];
$title=$_POST['searchtitle'];
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
     .carousel-item .row .col-md-3 .card .card-body .card-title{
        font-size:10px !important;
      }
      .carousel-item .row .col-md-3 .card  .card-footer{
        font-size:10px !important;
      }
      .card-title a:hover{
            color:blue !important;
      }
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
              <h1 class="mb-2 bread">News</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>News <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
      </section>
      
 <section class="ftco-section"> 
    <div class='row'>
    <div class="col-md-7 ml-3 mt-0 ftco-animate  overflow" >
    <?php
    $found=0;
      if($search=='search'){
    $sql="SELECT * FROM news where title like '%$title%'";
    $result=mysqli_query($conn,$sql);
    while($row1=mysqli_fetch_array($result)){
      $found=1;
      ?>
      
        <div class="card mb-5 ftco-animate">
           <img src="postimage/<?php echo $row1['featuredimage'];?>" class="card-img-top" alt="">     
           <div class="card-body mt-3">
            <h3 class="card-title"><a href="detailnew.php?nid=<?php echo $row1['nid'];?>"class="text-dark" ><?php echo $row1['title'];?></a></h3>
            <a href="detailnew.php?nid=<?php echo $row1['nid'];?>" class="btn btn-primary" >Read more →</a>
            </div>
             <div class="card-footer text-muted" >
               <em> <i class="fa fa-calendar"></i>  </b><?php echo htmlentities($row1['date']);?>    <i class="fa fa-id-card"></i>  <b><?php echo htmlentities($row1['username']);?></b>  </em>
            </div>
         </div>
      
      <?php
     }
     if($found==0){
     ?>
    <div class="card mb-5 ftco-animate">
           <div class="card-body mt-3">
            <h3 class="card-title"><a href=""class="text-dark" >NO FOUND</a></h3>
            </div>
             <div class="card-footer text-muted" >
            </div>
         </div>
    <?php }}
   else{
    
    $sql2="SELECT * from news ORDER BY nid DESC";
     $result2=mysqli_query($conn,$sql2);
     while($row1=mysqli_fetch_array($result2)){
      ?>
        <div class="card mb-5 ftco-animate">
           <img src="postimage/<?php echo $row1['featuredimage'];?>" class="card-img-top" alt="<?php echo $row1['title'];?>">     
           <div class="card-body mt-3">
            <h3 class="card-title"><a href="detailnew.php?nid=<?php echo $row1['nid'];?>"class="text-dark" ><?php echo $row1['title'];?></a></h3>
            <a href="detailnew.php?nid=<?php echo $row1['nid'];?>" class="btn btn-primary" >Read more →</a>
            </div>
             <div class="card-footer text-muted" >
             <em> <i class="fa fa-calendar"></i>  </b><?php echo htmlentities($row1['date']);?>    <i class="fa fa-id-card"></i>  <b><?php echo htmlentities($row1['username']);?></b>  </em>
            </div>
         </div>
      
      <?php
     }}
     ?>
     </div>
<?php
      
        include('include/sidbar.php');
    ?>
     </div>
     </section>
    <!-- start of carousel -->
    <section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6 text-left">
                    <a class="btn btn-primary mb-3 mr-1" 
                       href="#carouselExampleIndicators2"
                       role="button"
                        data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
                <div class="col-6 text-right">
                    
                    <a class="btn btn-primary mb-3"
                       href="#carouselExampleIndicators2"
                       role="button"
                       data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="col-12">
                <div id="carouselExampleIndicators2" 
                         class="carousel slide"
                         data-ride="carousel">

                        <div class="carousel-inner">
                        <?php
                    
                         
                          $sql="select * from news ORDER BY nid DESC";
                          $int=0;
                          $i=0;
                          $colno=1;
                          $result=mysqli_query($conn,$sql);
                          $norow=mysqli_num_rows($result);
                          $remain=$norow % 4;
                        
                          while($row=mysqli_fetch_array($result)){
                            
                          
                            if($int==0){
                            $image1=$row['featuredimage'];
                            $title1=$row['title'];
                            $date1=$row['date'];
                            $nid1=$row['nid'];
                            $int++;
                            $norow--;
                            }
                            else if($int==1){
                              $image2=$row['featuredimage'];
                              $title2=$row['title'];
                              $date2=$row['date'];
                              $nid2=$row['nid'];
                              $int++;
                              $norow--;
                            
                            }
                            else if($int==2){
                              $image3=$row['featuredimage'];
                              $title3=$row['title'];
                              $date3=$row['date'];
                              $nid3=$row['nid'];
                              $int++;
                              $norow--;
                            
                            }
                            else if($int==3 && $norow >=1){
                              
                              $image4=$row['featuredimage'];
                              $title4=$row['title'];
                              $date4=$row['date'];
                              $nid4=$row['nid'];
                              $int=0;
                              $norow--;
                              $i=$i+3;
                              if($i<=3){
                              echo ' <div class="carousel-item active">';
                              }
                              else{
                              echo '<div class="carousel-item">';
                              }

                            ?>
                           <div class="row">
                          <div class="col-md-3 mb-4 ftco-animate" >
                          <div class="staff">
                                    <div class="card">
                                      <img src="postimage/<?php echo $image1;?>" class="card-img-top" alt="">     
                                      <div class="card-body mt-3 ">
                                        <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid1)?>"class="text-dark" ><?php echo $title1;?></a></h3>
                                        <a href="detailnew.php?nid=<?php echo $nid1;?>" class="btn btn-primary" >Read more →</a>
                                        </div>
                                        <div class="card-footer text-muted" >
                                          Posted on <?php echo $date1;?>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                             <div class="col-md-3 mb-4 ftco-animate " >
                             <div class="staff">
                              <div class="card">
                                <img src="postimage/<?php echo $image2;?>" class="card-img-top" alt="">     
                                  <div class="card-body mt-3 ">
                                    <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid2)?>"class="text-dark" ><?php echo $title2;?></a></h3>
                                    <a href="detailnew.php?nid=<?php echo $nid2;?>" class="btn btn-primary" >Read more →</a>
                                  </div>
                                  <div class="card-footer text-muted" >
                                    Posted on <?php  echo $date2;?>
                                  </div>
                              </div>
                          </div>
                          </div>
                          <div class="col-md-3 mb-4 ftco-animate" >
                          <div class="staff">
                              <div class="card">
                                <img src="postimage/<?php echo $image3;?>" class="card-img-top" alt="">     
                                <div class="card-body mt-3 ">
                                  <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid3)?>"class="text-dark" ><?php echo $title3;?></a></h3>
                                  <a href="detailnew.php?nid=<?php echo $nid3;?>" class="btn btn-primary" >Read more →</a>
                                </div>
                                 <div class="card-footer text-muted" >
                                    Posted on <?php echo $date3;?>
                                </div>
                            </div>
                         </div>
                         </div>
                          <div class="col-md-3 mb-4 ftco-animate " >
                             <div class="staff">
                              <div class="card">
                                <img src="postimage/<?php echo $image4;?>" class="card-img-top" alt="">     
                                  <div class="card-body mt-3 ">
                                    <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid4)?>"class="text-dark" ><?php echo $title4;?></a></h3>
                                    <a href="detailnew.php?nid=<?php echo $nid4;?>" class="btn btn-primary" >Read more →</a>
                                  </div>
                                  <div class="card-footer text-muted" >
                                    Posted on <?php  echo $date4;?>
                                  </div>
                              </div>
                          </div>
                       </div>

                       </div>     
                    </div>
                    <?php }
                 if( $norow==0 && $remain==3){
                            $int=0;
                              $colno=1;
                              $i=$i+3;
                              if($i<=3){
                              echo ' <div class="carousel-item active">';
                              }
                              else{
                              echo '<div class="carousel-item">';
                              }

                            ?>
                           <div class="row">
                          <div class="col-md-3 mb-4 ftco-animate" >
                          <div class="staff">
                                    <div class="card">
                                      <img src="postimage/<?php echo $image1;?>" class="card-img-top" alt="">     
                                      <div class="card-body mt-3 ">
                                        <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid1)?>"class="text-dark" ><?php echo $title1;?></a></h3>
                                        <a href="detailnew.php?nid=<?php echo $nid1;?>" class="btn btn-primary" >Read more →</a>
                                        </div>
                                        <div class="card-footer text-muted" >
                                          Posted on <?php echo $date1;?>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                             <div class="col-md-3 mb-4 ftco-animate " >
                             <div class="staff">
                              <div class="card">
                                <img src="postimage/<?php echo $image2;?>" class="card-img-top" alt="">     
                                  <div class="card-body mt-3 ">
                                    <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid2)?>"class="text-dark" ><?php echo $title2;?></a></h3>
                                    <a href="detailnew.php?nid=<?php echo $nid2;?>" class="btn btn-primary" >Read more →</a>
                                  </div>
                                  <div class="card-footer text-muted" >
                                    Posted on <?php  echo $date2;?>
                                  </div>
                              </div>
                          </div>
                          </div>
                          <div class="col-md-3 mb-4 ftco-animate" >
                          <div class="staff">
                              <div class="card">
                                <img src="postimage/<?php echo $image3;?>" class="card-img-top" alt="">     
                                <div class="card-body mt-3 ">
                                  <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid3)?>"class="text-dark" ><?php echo $title3;?></a></h3>
                                  <a href="detailnew.php?nid=<?php echo $nid3;?>" class="btn btn-primary" >Read more →</a>
                                </div>
                                 <div class="card-footer text-muted" >
                                    Posted on <?php echo $date3;?>
                                </div>
                            </div>
                           </div>
                          </div>
                         </div>
                        </div>
              <?php  }
                 if( $norow==0 && $remain==2){
                            $int=0;
                              $colno=1;
                              $i=$i+3;
                              if($i<=3){
                              echo ' <div class="carousel-item active">';
                              }
                              else{
                              echo '<div class="carousel-item">';
                              }

                            ?>
                           <div class="row">
                          <div class="col-md-3 mb-4 ftco-animate" >
                          <div class="staff">
                                    <div class="card">
                                      <img src="postimage/<?php echo $image1;?>" class="card-img-top" alt="">     
                                      <div class="card-body mt-3 ">
                                        <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid1)?>"class="text-dark" ><?php echo $title1;?></a></h3>
                                        <a href="detailnew.php?nid=<?php echo $nid1;?>" class="btn btn-primary" >Read more →</a>
                                        </div>
                                        <div class="card-footer text-muted" >
                                          Posted on <?php echo $date1;?>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                             <div class="col-md-3 mb-4 ftco-animate " >
                             <div class="staff">
                              <div class="card">
                                <img src="postimage/<?php echo $image2;?>" class="card-img-top" alt="">     
                                  <div class="card-body mt-3 ">
                                    <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid2)?>"class="text-dark" ><?php echo $title2;?></a></h3>
                                    <a href="detailnew.php?nid=<?php echo $nid2;?>" class="btn btn-primary" >Read more →</a>
                                  </div>
                                  <div class="card-footer text-muted" >
                                    Posted on <?php  echo $date2;?>
                                  </div>
                              </div>
                          </div>
                          </div>
                          </div>
                          </div>
              <?php  }
                      if(  $norow==0 && $remain ==1){
                          $int=0;
                          $colno=1;
                          $i=$i+3;
                          if($i<=3){
                          echo ' <div class="carousel-item active">';
                          }
                          else{
                          echo '<div class="carousel-item">';
                          }

                        ?>
                       <div class="row">
                      <div class="col-md-3 mb-4 ftco-animate" >
                      <div class="staff">
                                <div class="card">
                                  <img src="postimage/<?php echo $image1;?>" class="card-img-top" alt="">     
                                  <div class="card-body mt-3 ">
                                    <h3 class="card-title"><a href="detailnew.php?nid=<?php echo htmlentities($nid1)?>"class="text-dark" ><?php echo $title1;?></a></h3>
                                    <a href="detailnew.php?nid=<?php echo $nid1;?>" class="btn btn-primary" >Read more →</a>
                                    </div>
                                    <div class="card-footer text-muted" >
                                      Posted on <?php echo $date1;?>
                                    </div>
                                </div>
                                </div>
                              </div>
                              </div>
                              </div>
                      <?php  }
                  }?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- end of carousel -->
    </section>
    <?php include('include/footer.php');?>
</body>
</html>