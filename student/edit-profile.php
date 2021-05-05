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
    include 'dashboard-student.html';


try{
    $connection=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

?>

<?php

if(isset($_POST['submit']))
  {
    $fullName=$_POST['fullname'];
    $gender=$_POST['gender'];
    $pass=$_POST['pass'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
     

    $t2 = new User();
    $t2->setUserID($uid);
    $t2->setFullName($fullName);
    $t2->setGender($gender);
    $t2->setMobile($mobile);
    $t2->setEmail($email);
    $t2->setPwd($pass);
    
    
    $result = $t2->updateUser($connection);
    
    if($result == true)
    {
        echo "<script>alert('Profile Has been Updated.')</script>";
        
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
<link rel="stylesheet" href="edit.css?ver=<?php echo rand(111,999)?>">
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
$stmt = $connection->query("select fullname,gender,mobile,password,email  from user where usr_id=$uid");

// $query=mysqli_query($connectId,"select * from  education where  usr_id=$uid");
// $rw=mysqli_num_rows($query);
//$rw = $stmt->rowCount();
//if($rw>0)
//{
    // while($row=mysqli_fetch_array($query)){
    $cnt =1;
    while ($row = $stmt->fetch()){
//$ret=mysqli_query($connectId,"select fullname,gender,mobile,password,email  from user where usr_id=$uid");
//$cnt=1;
//while ($row=mysqli_fetch_array($ret)) {

?>

<label>Full Name</label>
<input type="text" class="form-control" id="fullname" name="fullname" required="true" 
value="<?php  echo $row['fullname'];?>"><br/>
<label>Gender</label>
<input type="text" class="form-control" id="gender" name="gender" value="<?php  echo $row['gender'];?>" required="true">
<label>Email</label>
<input type="text" class="form-control" id="email" name="email" value="<?php  echo $row['email'];?>" required="true">

<label>Password</label>
<input type="password" class="form-control" id="pass" name="pass"  value="<?php  echo $row['password'];?>" required="true">
    <label >Mobile Number</label>
    <input type="text" class="form-control" name="mobile" required="true"  value="<?php  echo $row['mobile'];?>">
    
     
                                
                     
                                  
    
       <?php } ?>
     <button type="submit" class="btn btn-primary" name="submit">Update</button>
      </form>
  
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
 
 