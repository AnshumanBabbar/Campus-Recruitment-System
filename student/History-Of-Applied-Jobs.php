<?php

session_start();
error_reporting(0);
//include('../includes/dbconfig.php');
//include('./ApplyJobs.class.php');
include ('dbconnection.php');
//global $connection;
 if (strlen($_SESSION["user_id_session"]==0)) {

    echo "not found";
  } 
else{
    
    $uid= $_SESSION["user_id_session"];
    //echo "userId : ".$uid;
    //echo $uid;
}

?>
<?php
$pageHeading="History Of Applied Jobs";
include("dashboard-student.html");


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CRMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./applied-jobs.css?ver=<?php echo rand(111,999)?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="../img/logo.png">	


</head>
<body>


 
 
 
 <div  class = "frm-1">
 
 
  <div class="container-1">
  
  
   <table id="t01" style="width:96%">
       <thead>
           <tr>
    <th>S.No</th>
    <th>Apply Job ID</th>
    
    <th>Company Name</th>
    <th>Job Title</th>
    <th>Status</th>
	<th>Action</th>
	
  </tr>
           </thead>
   <tbody>        
<?php
   
   // require_once 'dbconnection.php';
    require_once 'ApplyJobs.class.php';
    
      //echo $cnt;
        
        $connection=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        ApplyJobs::displayTable($connection,$uid); 
         
     

            
         ?>
       </tbody>
       </table>
</div>
</div>
   

       

 </body>



 
 </html>
 
 
 <?php ?>
 
 
 

 
 
 
 
 
 
 
 