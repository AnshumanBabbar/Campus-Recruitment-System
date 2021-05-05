<?php
session_start();
error_reporting(0);
include ('dbconnection.php');
if (strlen($_SESSION["user_id_session"]==0)) {

    echo "not found";
  } 
else{
    
    $uid= $_SESSION["user_id_session"];
   // echo "<center>userId : ".$uid."</center";
    //echo uid$uid;
    echo "&nbsp; &nbsp;";
    $jid=$_GET['jobid'];
    //echo "<center>".$jid."</center>";
}
?>
<?php

$pageHeading="Job Detail";
include("dashboard-student.html");


?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>CRS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./applied-jobs.css?ver=<?php echo rand(111,999)?>">
<link rel="icon" type="image/png" href="./img/logo.png">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="../img/logo.png">	
<style>

    #con1{
        min-height: 200px;
        
    }
    
    
</style>


</head>
<body>


 
 
 
 



 
 
 
 <div  class = "frm-1">
 
 
  <div class="container-1">
  
   
      
<table  style="width:96%; margin-top:30px;border='3';" class="table">

    <tbody>
   
   <?php
    require_once 'JobDetail.class.php';
    require_once 'User.Class.php';
    //require_once 'dbconnection.php';
    
    $connection=new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);
    JobDetail::displayJob($connection,$jid,$uid);
     
    User::displayUser($connection,$uid);
    
    ?>

  </tbody>
      </table>
     </div>
    </div>
    </body>
</html>