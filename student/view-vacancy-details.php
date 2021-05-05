<?php
session_start();
error_reporting(0);
include('../includes/dbconfig.php');

 global $connectId;

    
    if (strlen($_SESSION['user_id_session']==0)) {

    echo "not found";
  } else{
    
$jobid=$_GET['viewid'];
    $uid= $_SESSION["user_id_session"];
    require_once 'User.Class.php';
    require_once 'JobDetail.class.php';


try{
    $connection=new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);

?>
<?php
$pageHeading="Apply for Vacancy";
include("dashboard-student.html");
//require_once 'JobDetail.class.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CRS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../company/delete-vacancy.css?ver=<?php echo rand(111,999)?>">
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
  


      
<table  style="width:96%; margin-top:10px;" class="table">
 <?php
    JobDetail::displayVacancyDetails($connection,$jobid);
    
    ?>
      <form method="post">
      <tr align="center">
          
        
    <td colspan="4"><button type="submit" id="submit" name="submit" class="btn btn-primary">Apply Now</button></td>
  </tr>
          
          <?php
          if(isset($_POST["submit"])){
              
       
              
              $cnt=JobDetail::checkJobApplied($connection,$jobid,$uid);
              
              if($cnt>0){
                  
                  echo "<script>alert('You have already applied for this job')
                  document.getElementById('submit').style.backgroundColor = 'red';
                  document.getElementById('submit').disabled=true;
                  </script>";
              }
              
              else{
                  $result=JobDetail::applyForNewJob($connection,$jobid,$uid);
                  
                  if($result==true){
                      echo "<script>alert('You have applied successfuly for this job');
                      document.getElementById('submit').style.backgroundColor = 'green';
                  document.getElementById('submit').disabled=true;
                      </script>";
                      
                  }
                  else{
                      echo "<script>alert('Something went wrong')</script>"; 
                  }
                 
              }
          }
          ?>
          </form>
</table>
     </div>

      
    </div>

 </body>
  


 </html>
 
 
  
 <?php
    

}
catch(PDOException $e){
    echo "You are not connected to $dbname database <br/>";
}
    ?>
 <?php }?>
 
 

 
 
 
 
 
 
 
 