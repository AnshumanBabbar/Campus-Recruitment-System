<?php
session_start();
error_reporting(0);
include('../includes/dbconfig.php');

 global $connectId;

    
    if (strlen($_SESSION['admin_id_session']==0)) {

    echo "not found";
  } else{
    
    $aid= $_SESSION["admin_id_session"];
    require_once 'Admin.Class.php';


try{
    $connection=new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);

?>
<?php
$pageHeading="Registered User";
include("dashboard-admin.html");


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
    
    #t01{
        font-size: 22px;
    }
    </style>
</head>
<body>

<div  class = "frm-1">
 
 
  <div class="container-1">
  
 
   <table  id="t01" style="width:96%">
 
       <tbody>
      
         <?php
    
             $uid=$_GET['viewid'];
           
           $admin=new Admin();
           $admin->displayUserDetails($connection,$uid);
           //$admin->displayUserDetails($connection,$uid);
       
           ?>
</tbody>
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
 
 
 
<?php } ?>
 
 
 
 
 
 
 
 