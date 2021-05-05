<?php

require_once('./includes/dbconfig.php');

global $connectId;

?>
<?php 
require_once 'Main.class.php';


try{
    $connection=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    
    



?>

<html>
<head>
<title>Home Page</title> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="./css/styleHome.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
<link rel="icon" type="image/png" href="./img/logo.png">			
<link href="./css/about.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
<style>

.abt{
    line-height:1.8;
}
    </style>
</head>
<body background-image: url(../img/1.jpg);>
    <div class="menu-bar">
<ul>
<li><a href="index1.php"> Home</a></li>
    <li  class="active" ><a href="aboutus.php">About Us</a></li>
    <li><a href="#">Candidates</a>
    <div class="sub-menu-1">
        <ul>
        <li><a href="./student/student-login.php">Sign In</a></li>
        <li><a href="./student/student-signUp.php">Sign Up</a></li>
        </ul>
        </div>
        
    </li>
    <li><a href="admin/admin-login.php">Admin</a></li>
    <li><a href="#">Employers</a>
     <div class="sub-menu-1">
        <ul>
        <li><a href="./company/employer-login.php">Sign In</a></li>
        <li><a href="./company/employerSignUp.php">Sign Up</a></li>
        </ul>
        </div>
    </li>
    <li><a href="index1.php">Listed Jobs</a></li>
    <li><a href="contact.php">Contact</a></li>
</ul>
        </div>
    
    <div class="main-img">
      
        <center>
    <img src="./img/1.jpg" width="1540px" height="500px" alt="img">
        </center>
    </div>
   
 
 
 
  <div class="container-tab">
  <div class ="frm-tab abt">
      
      
     
 <?php
    Main::displayabout($connection);
    
    ?>
  
</div>
</div>
<footer>
    <div class="foot">
        
        <img src="img/campus-recruitment.png" class="foot-img"/>
        <div class = "newsletter">
            <input type="text" placeholder="Subscribe" class="txt">&nbsp;&nbsp;<input type="submit" value="Subcribe to Newsletter" class="btn"> 
        </div>
        <div class="contact"><i class="fa fa-facebook-square"></i>&nbsp;&nbsp;<i class="fa fa-instagram"></i>&nbsp;&nbsp;<i class="fa fa-twitter-square"></i></div>
        <div class="Copyright">Website&nbsp;&#169;&nbsp;Campus Recruitment System</div>
    </div></footer>
 <?php
    

}
catch(PDOException $e){
    echo "You are not connected to $dbname database <br/>";
}
    ?>