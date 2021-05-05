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
    $connection=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

?>
<?php
$pageHeading="Manage  Details";
include("dashboard-student.html");


?>
<?php

if(isset($_POST['submit']))
  {
      $edu_id = $_POST['edu_id'];
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
    
   
     
    $t2 = new User();
    $t2->setUserID($uid);
    $t2->setEduID($edu_id);
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
    
    $result = $t2->UpdateEducation($connection);
   
   // $sqlCmd = "update  education set  schoolboard = '$schoolboard',schoolyear = '$schoolyear',schoolpercent ='$schoolpercent',collegename = '$collegename',collegeyear ='$collegeyear',collegepercent='$collegepercent',universityname='$universityname',universitypercent='$universitypercent',universityyear='$universityyear',skills='$skills',certifications='$certifications'  where usr_id =$uid";
   // $result =$connection->exec($sqlCmd);
    if($result == true)
    {
        echo "<script>alert('Education Detail Has been Updated.')</script>";
        
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
  
  <?php 
   
$stmt = $connection->query("select * from education where usr_id =  $uid ");
 
  // $query=mysqli_query($connectId,"select * from  education where  usr_id=$uid");
  // $rw=mysqli_num_rows($query);
 $rw = $stmt->rowCount();
   if($rw>0)
   {
      // while($row=mysqli_fetch_array($query)){
       while ($row = $stmt->fetch()){
           ?>

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
   
<td><input type="text" class="form-control" id="schoolboard" name="schoolboard" required="true"  value= "<?php echo $row['schoolboard'];?>"></td>

<td><input type="text" class="form-control" id="schoolyear" name="schoolyear" required="true"  value="<?php echo $row['schoolyear'];?>"></td>

<td><input type="text" class="form-control" id="schoolpercent" name="schoolpercent"  required="true" value="<?php echo $row['schoolpercent'];?>"></td>
</tr>
<tr>
<th>College </th>
<td><input type="text" class="form-control" id="collegename" name="collegename" value = "<?php echo $row['collegename'];?>"  required="true"  ></td>

<td><input type="text" class="form-control" id="collegeyear" name="collegeyear" value="<?php echo $row['collegeyear'];?>" required="true" ></td>

<td><input type="text" class="form-control" id="collegepercent" name="collegepercent" value="<?php echo $row['collegepercent'];?>" required="true"></td>
</tr>
<tr>
<th>University </th>
<td><input type="text" class="form-control" id="universityname" name="universityname" value="<?php echo $row['universityname'];?>"  required="true" ></td>

<td><input type="text" class="form-control" id="universityyear" name="universityyear" value="<?php echo $row['universityyear'];?>"  required="true" ></td>

<td><input type="text" class="form-control" id="universitypercent" name="universitypercent" value="<?php echo $row['universitypercent'];?>"  required="true"></td>

</tr>

</table>
<table class="table table-bordered table-hover data-tables">
    <tr>
<th >Certifications</th>
<td ><input type="text" class="form-control" id="certifications" name="certifications" value="<?php echo $row['certifications'];?>"  required="true"></td>
</tr>
<tr>
<th >Skills</th>
<td ><input type="text" class="form-control" id="skills" name="skills" value="<?php echo $row['skills'];?>"   required="true"></td>
</tr>
</table>
 <?php } ?>
                               <hr />
     <input type="submit" class="btn btn-primary" name="submit" value="submit" />
                            </form>
                             <?php }  else {?>
                             <h3 align="center" style="color:red">No Record found</h3>
 <?php } ?>  




       
  





       

</div>
</div>
 </body>


 <script src="add-vacancy.js"></script>
 

 </html>
 
 <?php
    

}
catch(PDOException $e){
    echo "You are not connected to $dbname database <br/>";
}
    ?>
 
 
 
 
 
 
<?php } ?>
 
 
 