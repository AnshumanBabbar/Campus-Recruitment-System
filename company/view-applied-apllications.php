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
    
$pageHeading="View Details Of Applicant";
include("dashboard.html");


?>
  <?php
$vid=$_GET["viewid"];
//echo "view id is " .$vid;

    
?>

<?php if(isset($_POST['submit'])){
                                           
      $status=$_POST["status"];
        
        $queryId=mysqli_query($connectId,"update applyjob set status='$status' where applyjob_id='$vid'");
        
        if($queryId){
            echo "status updated";
        }
       
            }?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CRS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./delete-vacancy.css?ver=<?php echo rand(111,999)?>">
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
  
   <?php
$vid=$_GET['viewid'];
    //echo "view id is".$vid;
$ret=mysqli_query($connectId,"select vacancy.job_id, vacancy.jobtitle, vacancy.monthlysalary, vacancy.jobdescription, vacancy.noofopening, vacancy.joblocation, applyjob.applyjob_id,applyjob.remark,applyjob.status,user.usr_id as uid ,user.fullname,user.email,user.mobile,user.sid,user.gender from applyjob join user on applyjob.usr_id=user.usr_id join vacancy on applyjob.job_id=vacancy.job_id where applyjob.applyjob_id='$vid'");
$cnt=1;
    
while ($row=mysqli_fetch_array($ret)) {

?>

      
<table  style="width:96%; margin-top:10px;" class="table">
    <tr>
  <th>Job Title</th>
  <td><?php  echo $row['jobtitle'];?></td>
  <th>Monthly In-hand Salary</th>
  <td><?php  echo $row['monthlysalary'];?></td>
  </tr>
   <tr>
  <th>Job Descriptions</th>
  <td colspan="3"><?php  echo $row['jobdescription'];?></td>
  </tr>
  <tr>
  <th>Job Location</th>
  <td><?php  echo $row['joblocation'];?></td>
  <th>No of Opening</th>
  <td><?php  echo $row['noofopening'];?></td>
  </tr>
 
 
  <tr>
  <th>Full Name</th>
  <td><?php  echo $row['fullname'];?></td>
  <th>Email</th>
  <td><?php  echo $row['email'];?></td>
  </tr>
  <tr>
  <th>Mobile Number</th>
  <td><?php  echo $row['mobile'];?></td>
  <th>Student ID </th>
  <td><?php  echo $row['sid'];?></td>
  </tr>
  <tr>
  <th>Gender </th>
  <td><?php  echo $row['gender'];?></td>
  <th>Address </th>
  <td><?php  echo $row['Address'];?></td>
  </tr>

  <tr>
  <th>Status </th>
    <td>   <?php  
if($row['status']=="")
{
  echo "Not Responded Yet";
}
else
{
  echo $pstatus=$row['status'];
}

                                       ;?></td>
    <th>Update </th>
      <td><form method="post"> <input type="text" name="status"><input type="submit" name="submit" value="submit"> </form> </td>
                <?php 
$cnt=$cnt+1;
}?>
  </tr>
</table>
     </div>

         <div id="con1"  class="container-1">
      <center>
      <h3 class="edu">Education Details</h3>
  </center>
  
  <?php

$ret=mysqli_query($connectId,"SELECT * from education, applyjob where education.usr_id=applyjob.usr_id and applyjob_id='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?> <table class="table ">
  
<tr>
  <th>#</th>
   <th>Board / University</th>
    <th>Year</th>
     <th>Percentage</th>
      

</tr>
<tr>
<th>School</th>
<td><?php  echo $row['schoolboard'];?></td>
<td><?php  echo $row['schoolyear'];?></td>
<td><?php  echo $row['schoolpercent'];?></td>

</tr>
<tr>
<th>College</th>
<td><?php  echo $row['collegename'];?></td>
<td><?php  echo $row['collegeyear'];?></td>
<td><?php  echo $row['collegepercent'];?></td>

</tr>
<tr>
<th>University</th>
<td><?php  echo $row['universityname'];?></td>
<td><?php  echo $row['universityyear'];?></td>
<td><?php  echo $row['universitypercent'];?></td>


</tr>


</table>
<table class="table table-bordered table-hover data-tables">
    <tr>
<th>Certifications</th>
<td> <?php  echo $row['certifications'];?></td>
</tr>
<tr>
<th>Skills</th>
<td><?php  echo $row['skills'];?></td>
</tr>
</table>
<?php } ?>      
      
  
  

 
 
     </div>
    </div>
 
 </body>
  


 </html>
 
 
 
 
 
 
 <?php } ?>
 
 
 
 
 
 
 
 