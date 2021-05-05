<?php
session_start();
error_reporting(0);
include('../includes/dbconfig.php');

 global $connectId;
if (strlen($_SESSION['comp_id_session']==0)) {

    echo "not found";
  } else{
    
    $cid= $_SESSION["comp_id_session"];
    $sqlStmt="select companyname from company where comp_id='$cid'";
    $queryId=mysqli_query($connectId, $sqlStmt);
    $rec=mysqli_fetch_array($queryId);
    $msg= strtoupper($rec[0]);
            
    //echo "company id $cid";
?>
<?php
$pageHeading="All Listed Applications";
include("dashboard.html");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CRMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../img/logo.png">	
<link rel="stylesheet" href="./delete-vacancy.css?ver=<?php echo rand(111,999)?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body>


 
 
 
 <div  class = "frm-1">
 
 
  <div class="container-1">
  
 
   <table id="t01" style="width:96%">
       <thead>
  <tr>
    <th>S.No</th>
    <th>Job Title</th>
    <th>Job Applied By</th>
	<th>Action</th>
	
  </tr>
           </thead>
       <tbody>
        <?php
       
    $queryId=mysqli_query($connectId,"select applyjob.applyjob_id,vacancy.jobtitle,user.fullname,applyjob.status from  applyjob,user,vacancy where applyjob.usr_id=user.usr_id and applyjob.job_id=vacancy.job_id and vacancy.comp_id='$cid' and applyjob.status='rejected'" );
  

$cnt=1;
while ($rec=mysqli_fetch_array($queryId)) {

?>
                                      <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $rec[1];?></td>
                  <td><?php  echo $rec[2];?></td>
                  <td><a href="view-applied-apllications.php?viewid=<?php echo $rec["applyjob_id"];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
       
</tbody>
</table>
</div>
</div>
 </body>



 <script src="add-vacancy.js"></script>

 </html>
 
 
 
 
 
 
 
<?php } ?>
 
 
 
 
 
 
 
 