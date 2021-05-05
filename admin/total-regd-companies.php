<?php
session_start();
error_reporting(0);
include('../includes/dbconfig.php');

 global $connectId;

    
    if (strlen($_SESSION['admin_id_session']==0)) {

    echo "not found";
  } else{
    
    $uid= $_SESSION["admin_id_session"];
    require_once 'Admin.Class.php';


try{
    $connection=new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);

?>
<?php
$pageHeading="Registered Companies";
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


</head>
<body>

<div  class = "frm-1">
 
 
  <div class="container-1">
  
 
   <table id="t01" style="width:96%">
       <thead>
  <tr>
    <th>S.No</th>
    <th>Company Name</th>
    <th>Company Website</th>
	<th>Action</th>
	
  </tr>
           </thead>
       <tbody>
        <?php
           
           $admin=new Admin();
           
           $admin->displayAllCompanies($connection);
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
 
 
 
 
 
 
 
 