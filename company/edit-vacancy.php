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
    
    $jid=$_GET['editid'];
    //echo "Job id is $jid";
?>
<?php
$pageHeading="Edit VACANCY";
include("dashboard.html");


?>
<?php

if(isset($_POST['submit']))
  {
    $jid=$_GET['editid'];
    $jtitle=$_POST['jobtitle'];
    $salary=$_POST['salary'];
    $jobdecs=$_POST['jobdecs'];
    $noofopenings=$_POST['noofopenings'];
    $jobloc=$_POST['jobloc'];
     
    $query=mysqli_query($connectId, "update vacancy set jobtitle='$jtitle',monthlysalary='$salary',jobdescription='$jobdecs',noofopening='$noofopenings',joblocation='$jobloc' where  job_id='$jid'");
    if ($query) {
    $msg2="Job Detail Has been Updated.";
  }
  else
    {
        $msg2="Something Went Wrong. Please try again";
    }

  
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CRS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./edit.css?ver=<?php echo rand(111,999)?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="../img/logo.png">	

<style>
    label{
        float: left;
    }    
</style>
</head>
<body>


 
 
 
 <div  class = "frm-1">
 
 
  <div class="container-1">
  <?php echo "$msg2";?>
 
 
<form method="post">

<?php
 $jid=$_GET['editid'];
$ret=mysqli_query($connectId,"select * from vacancy where job_id='$jid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<label>Job Title</label>
<input type="text" class="form-control" id="jobtitle" name="jobtitle" required="true" 
value="<?php  echo $row['jobtitle'];?>">
<label>Monthly In-hand Salary </label>
<input type="text" class="form-control" id="salary" name="salary" value="<?php  echo $row['monthlysalary'];?>" required="true">
<label for="inputAddress" class="col-form-label">Job Descriptions</label>
<textarea style="height : 150" type="text" class="form-control" id="jobdecs" name="jobdecs" required="true"><?php  echo $row['jobdescription'];?></textarea>
    
<label for="inputAddress" class="col-form-label">Job Location</label>
<input type="text" class="form-control" id="jobloc" name="jobloc" 
                                           value="<?php  echo $row['joblocation'];?>" required="true">
    <label >No of Opening</label>
    <input type="text" class="form-control"
                                        name="noofopenings" required="true"  value="<?php  echo $row['noofopening'];?>">
                                
                     
                                  
    
       <?php } ?>
     <button type="submit" class="btn btn-primary" name="submit">Update</button>
      </form>
  
    </div>
    </div>
     
 </body>
  



 </html>
 
 
  <?php } ?>
 
 
 
 
 
 
 
 
 
 
 
 