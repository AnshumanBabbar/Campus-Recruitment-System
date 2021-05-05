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
$pageHeading="Add VACANCY";
include("dashboard.html");


?>

<?php
    
if(isset($_POST['submit']))
  {

    $jtitle=$_POST['title'];
    $salary=$_POST['salary'];
    $jobdecs=$_POST['jobdescription'];
    $noofopenings=$_POST['vacancy'];
    $jobloc=$_POST['location'];
  
    //echo "$jtitle $salary $jobdecs $noofopenings $cid";
     
    $query=mysqli_query($connectId, "insert into vacancy values('','$cid','$jtitle','$jobdecs','$jobloc','$noofopenings','$salary')");
    if ($query) {
    echo '<script>alert("Job Detail has been added.")</script>';
    }
    

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Vacancy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./add-vacancy.css?ver=<?php echo rand(111,999)?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="../img/logo.png">	


</head>
<body>

 
 
 <div  class = "frm">
 
 <form method="post">
  <div class="container">
  <center>  <h1> Add Vacancy </h1> </center>
  <hr>
  
  <p>Job Title:</p>  <br>
  <input type="text" name="title" placeholder="title" size="19" /> 
  <p>Job Description:</p> <br>
  <input type="text" name="jobdescription" placeholder= "jobdescription" size="15"  /> 
  <p>Job Location:</p><br>
  <input type="text" name="location" placeholder="location" size="15"  /> 

  <p>Salary/Month:</p> <br>
  <input type="text" name="salary" placeholder= "salary" size="15"  /> 
<p>Total Vacancy:</p> <br>
<input type="text" name="vacancy" placeholder="vacancy" size="15" /> 

<input type="submit"  class="addbtn" name="submit" value="Submit">

</div>
     </form>
</div>

</body>

</html>
 
  <?php } ?>
 