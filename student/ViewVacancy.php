<?php
session_start();
error_reporting(0);
include('../includes/dbconfig.php');

 global $connectId;

    
    if (strlen($_SESSION['user_id_session']==0)) {

    echo "not found";
  } else{
    
    $uid= $_SESSION["user_id_session"];
   // require_once 'User.Class.php';
   require_once 'JobDetail.class.php';


try{
    $connection=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

?>
<?php
$pageHeading="All Listed Vacancies";
include("dashboard-student.html");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CRS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../img/logo.png">	
<link rel="stylesheet" href="../company/delete-vacancy.css?ver=<?php echo rand(111,999)?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body>

<div  class = "frm-1">
 
 
  <div class="container-1">
  
 
   <table id="t01" style="width:96%">
       <thead>
  <tr>
    <th>S.No</th>
    <th>Company Name</th>
    <th>Job Title</th>
	<th>Action</th>
	
  </tr>
           </thead>
       <tbody>
        <?php
           
           //JobDetail::displayAllVacancies($connection);

           JobDetail::displayAllVacancies($connection);
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
 
 
 
 
 
 
 
 