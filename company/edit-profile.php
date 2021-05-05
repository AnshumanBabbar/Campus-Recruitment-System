<?php
session_start();
error_reporting(0);
include('../includes/dbconfig.php');

 global $connectId;
if (strlen($_SESSION['comp_id_session']==0)) {

    echo "not found";
  } else{
    
    $cid= $_SESSION["comp_id_session"];
   
            
   //echo "company id $cid";
    
    $jid=$_GET['editid'];
    //echo "Job id is $jid";
?>
<?php
$pageHeading="EDIT PROFILE";
include("dashboard.html");


?>
<?php

if(isset($_POST['submit']))
  {
    $cmpName=$_POST['cmpName'];
    $person=$_POST['contactPerson'];
    $cmpEmail=$_POST['cmpEmail'];
    $pass=$_POST['pass'];
    $phone=$_POST['phone'];
    $cmpUrl=$_POST['cmpUrl'];
    $address=$_POST['address'];
     
    $query=mysqli_query($connectId, "update company set companyname='$cmpName',contactPerson='$person',companyemail='$cmpEmail',password='$pass',mobile='$phone',companyurl='$cmpUrl',companyaddress='$address' where  comp_id='$cid'");
    if ($query) {
    $msg2="Profile Has been Updated.";
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
<link rel="icon" type="image/png" href="../img/logo.png">	
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

$ret=mysqli_query($connectId,"select companyname,contactperson,companyemail,password,mobile,companyurl,companyaddress from company where comp_id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<label>Company Name</label>
<input type="text" class="form-control" id="cmpName" name="cmpName" required="true" 
value="<?php  echo $row['companyname'];?>">
<label>Contact Person</label>
<input type="text" class="form-control" id="contactPerson" name="contactPerson" value="<?php  echo $row['contactperson'];?>" required="true">
<label>Company Email</label>
<input type="text" class="form-control" id="cmpEmail" name="cmpEmail" value="<?php  echo $row['companyemail'];?>" required="true">

<label>Password</label>
<input type="password" class="form-control" id="pass" name="pass" 
                                           value="<?php  echo $row['password'];?>" required="true">
    <label >Mobile Number</label>
    <input type="text" class="form-control"
                                        name="phone" required="true"  value="<?php  echo $row['mobile'];?>">
    
     <label >Company Url</label>
    <input type="text" class="form-control"
                                        name="cmpUrl" required="true"  value="<?php  echo $row['companyurl'];?>">
    
     <label >Company Address</label>
    <input type="text" class="form-control"
                                        name="address" required="true"  value="<?php  echo $row['companyaddress'];?>">
                                
                     
                                  
    
       <?php } ?>
     <button type="submit" class="btn btn-primary" name="submit">Update</button>
      </form>
  
    </div>
    </div>
     
 </body>
  



 </html>
 
 
  <?php } ?>
 
 
 
 
 
 
 
 
 
 
 
 