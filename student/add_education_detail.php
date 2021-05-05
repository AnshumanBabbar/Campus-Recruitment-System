<?php
session_start();
error_reporting(0);
include('../includes/dbconfig.php');

global $connectId;


if (strlen($_SESSION['user_id_session']==0)) {
    
    echo "not found";
} else{
    
    $uid= $_SESSION["user_id_session"];
    require_once 'User.Class.php';
    
    
    try{
        $connection=new PDO("mysql:host=$host;dbname=$dbname;port=$port",$user,$pass);


?>
<?php
$pageHeading="Add Education";
include("dashboard-student.html");


?>
<?php


if(isset($_POST['submit']))
  {
   
    $schoolboard=$_POST['schoolboard'];
    $schoolyear=$_POST['schoolyear'];
    $schoolpercent=$_POST['schoolpercent'];
    $collegename=$_POST['collegename'];
    $collegeyear=$_POST['collegeyear'];
    $collegepercent=$_POST['collegepercent'];
    $universityname=$_POST['universityname'];
    $universityyear=$_POST['universityyear'];
    $universitypercent=$_POST['universitypercent'];
    $skills = $_POST['skills'];
    $certifications = $_POST['certifications'];
    
    /*
   $t2 = new User();
   
   $t2->setUserID($uid);

   $t2->setSchoolBoard($schoolboard);
   $t2->setSchoolPercent($schoolpercent);
   $t2->setSchoolYear($schoolyear);
   $t2->setCollegeName($collegename);
   $t2->setCollegePercent($collegepercent);
   $t2->setCollegeYear($collegeyear);
   $t2->setUniversityName($universityname);
   $t2->setUniversityPercent($universitypercent);
   $t2->setUniversityYear($universityyear);
   $t2->setSkills($skills);
   $t2->setCertifications($certifications);
   
   */
   
     

    $t2 = new User($uid,"$schoolboard","$schoolpercent","$schoolyear","$collegename","$collegepercent","$collegeyear","$universityname","$universitypercent","$universityyear","$skills","$certifications");
   
    $result = $t2->AddEducation($connection);
    
 //   $sqlCmd = "INSERT INTO education VALUES ('', '$uid', '$schoolboard', '$schoolyear', '$schoolpercent', '$collegename', '$collegeyear', '$collegepercent', '$universityname', '$universitypercent', '$universityear', '$certifications', '$skills')";
  //  $result =$connection->exec($sqlCmd);
    
    if($result == true)
    {
   
        echo "<script>alert('Education Detail Has been Added.')</script>";
        header('location:http://localhost/crs/company/dashboard.php');
        
    
    }
    else{
       
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


 
 
 
 <div  class = "frm-2">
 
 
  <div class="container-2">
  <?php echo "$msg2";?>
 <?php  
  // $sqlCmd="select * from education where usr_id =  $uid ";
 $stmt = $connection->query("select * from education where usr_id =  $uid ");
 
  // $query=mysqli_query($connectId,"select * from  education where  usr_id=$uid");
  // $rw=mysqli_num_rows($query);
  $rw = $stmt->rowCount();
   if($rw>0)
   {
      // while($row=mysqli_fetch_array($query)){
       while ($row = $stmt->fetch()){
           ?>
<p style="font-size:16px; color:red" align="center">Your Education Detail has already added.</p>
<table class="table table-bordered table-hover data-tables">
<tr>
  <th>#</th>
   <th>Board / University</th>
    <th>Year</th>
     <th>Percentage</th>
       

</tr>


<th>School</th>
  <td><?php echo $row['schoolboard'];?></td>
  <td><?php echo $row['schoolyear'];?></td>
   <td><?php echo $row['schoolpercent'];?></td>
</tr>

<tr>
  <th>College</th>
  <td><?php echo $row['collegename'];?></td>
   <td><?php echo $row['collegeyear'];?></td>
   <td><?php echo $row['collegepercent'];?></td>
</tr>
<tr>
  <th>University</th>
  <td><?php echo $row['universityname'];?></td>
  <td><?php echo $row['universityyear'];?></td>
  <td><?php echo $row['universitypercent'];?></td>
</tr>





</table>
   
<?php } } else {?>


                            <form method="post">
                                
                                <table class="table table-bordered table-hover data-tables">
  
<tr>
           <th>#</th>
           <th>Board / University</th>
           <th>Year</th>
           <th>Percentage</th>
           
           </tr>
<tr>
<th>School </th>
   
<td><input type="text" class="form-control" id="schoolboard" name="schoolboard" required="true" ></td>

<td><input type="text" class="form-control" id="schoolyear" name="schoolyear" required="true" ></td>

<td><input type="text" class="form-control" id="schoolpercent" name="schoolpercent"  required="true"></td>
</tr>
<tr>
<th>College </th>
<td><input type="text" class="form-control" id="collegename" name="collegename" required="true" ></td>

<td><input type="text" class="form-control" id="collegeyear" name="collegeyear" required="true" ></td>

<td><input type="text" class="form-control" id="collegepercent" name="collegepercent" required="true"></td>
</tr>
<tr>
<th>University </th>
<td><input type="text" class="form-control" id="universityname" name="universityname" required="true" ></td>

<td><input type="text" class="form-control" id="universityyear" name="universityyear" required="true" ></td>

<td><input type="text" class="form-control" id="universitypercent" name="universitypercent"  required="true"></td>

</tr>

</table>
<table class="table table-bordered table-hover data-tables">
    <tr>
<th >Certifications</th>
<td ><input type="text" class="form-control" id="certifications" name="certifications"  required="true"></td>
</tr>
<tr>
<th >Skills</th>
<td ><input type="text" class="form-control" id="skills" name="skills"   required="true"></td>
</tr>
</table>

                               <hr />
     <input type="submit" class="btn btn-primary" name="submit" value="submit" />
                            </form>
                             <?php } ?>
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
 