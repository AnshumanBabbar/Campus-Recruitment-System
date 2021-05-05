<?php

require_once('./includes/dbconfig.php');

global $connectId;
?>

<html>
<head>
<title>Home Page</title> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="./img/logo.png">			
<link href="./css/styleHome.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
</head>
<body background-image: url(../img/1.jpg);>
    <div class="menu-bar">
<ul>
<li class="active"><a href="#"> Home</a></li>
    <li ><a href="aboutus.php">About Us</a></li>
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
    <img src="./img/1.jpg" width="1540px" height="500px" alt="img" class="mySlides">
    
        </center>
    
    </div>
    <hr class="line"/>
    <div class="title"><h1><center>JOB POSITIONS</center></h1></div>
    
    <?php
    
    
    $sqlStmt="Select jobtitle,joblocation,noofopening,monthlysalary,companyname from vacancy JOIN company on vacancy.comp_id=company.comp_id LIMIT 10";
    $queryId=mysqli_query($connectId, $sqlStmt);
    
    $count=mysqli_num_rows($queryId);
    
    
    if($count>0){
        while($rec=mysqli_fetch_array($queryId)){
            
        
?>
    <div class="vacancy">
             
            
<h1 class="title"><center><?php echo $rec["jobtitle"]; ?>
</center>
</h1>
    
    <center><p class="cmp"><i class= "fa fa-suitcase"></i>&nbsp;&nbsp;&nbsp;<?php echo $rec["companyname"]; ?></p></center>
        <ul class="list-item"><center>
            <li><i class= "fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $rec["joblocation"]; ?></li>
            <li><i class= "fa fa-users"></i>&nbsp;&nbsp;<?php echo $rec["noofopening"]; ?></li>
            <li><i class= "fa fa-money"></i>&nbsp;&nbsp;<?php echo $rec["monthlysalary"]; ?></li></center>
        </ul>
    </div>
     <?php }}
      else{
          echo "Data not found";
           mysqli_close($connectId);
      }
      ?>
</body>
<footer>
    <div class="foot">
        
        <img src="img/campus-recruitment.png" class="foot-img"/>
        <div class = "newsletter">
            <input type="text" placeholder="Subscribe" class="txt">&nbsp;&nbsp;<input type="submit" value="Subcribe to Newsletter" class="btn"> 
        </div>
        <div class="contact"><i class="fa fa-facebook-square"></i>&nbsp;&nbsp;<i class="fa fa-instagram"></i>&nbsp;&nbsp;<i class="fa fa-twitter-square"></i></div>
        <div class="Copyright">Website&nbsp;&#169;&nbsp;Campus Recruitment System</div>
    </div></footer>
    <script>

    </script>
</html>