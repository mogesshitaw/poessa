<?php 
$conn=mysqli_connect("localhost","root","","poessa") or die("connection error");//create connection
$color="SELECT * FROM page_contact";
$cquery=mysqli_query($conn,$color);
$ROW=mysqli_fetch_array($cquery);
$color=$ROW['pagebackgroundcolor'];
    $image=$ROW['slide1'];  
    $image2=$ROW['slide2'];  
    $image3=$ROW['slide3'];  
?>