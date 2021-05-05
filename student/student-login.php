<?php
session_start();
error_reporting(0);
require_once('../includes/dbconfig.php');
if(isset($_GET["submit"])){
    
   $email=$_GET["email"];
    $password=$_GET["password"];
    
    
    
    
    //global $queryId;
    
    global $connectId;
    if($email!="" && $password!="" ){
       
    $sqlStmt="select * from user where email='$email' and password='$password'";
    
    $queryId=mysqli_query($connectId, $sqlStmt);
    
    $count=mysqli_num_rows($queryId);
    
    
    if($count>0){
             $rec=mysqli_fetch_array($queryId);
             $_SESSION["user_id_session"]=$rec["usr_id"];
	         //$msg=$_SESSION["user_id_session"];
             header('location:./UserDashboard.php');
        }
        
        else{
            $msg="Details Not Found";
        }
        
        }
       
    
    else{
        
        $msg="All fields must be filled ";
    }
    
    mysqli_close($connectId);
        
    }

       
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Candidate Sign In</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" type="image/png" href="./img/logo.png">	
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../css/style3.css?ver=<?php echo rand(111,999)?>">
        
        <style>
            .msg p{
                
                margin-left: 90px;
                color: red;
            }
        </style>
        
	</head>

<div class="parent-wrapper">
<img src="../img/studentlogin.png">
<div class="wrapper">
     
          <div class="msg">
                <p><?php
                   if($msg){
                       echo "$msg";
                   }
               
                ?>        </p>
                </div>
  <h1>LOGIN</h1>
  <hr>
    
  <form>
    <label id="icon" for="username"><i class="fa fa-user"></i></label>
    <input type="text" placeholder="Registered Email" name="email" id="username">
    <label id="icon" for="password"><i class="fa fa-key"></i></label>
    <input type="password" name="password" placeholder="Password" id="password">
    <input name="submit" type="submit" value="Sign In">
    <hr>
     
    <div class="crtacc"><a href="student-signUp.php">Create Account</a></div>
  </form>
</div>
</div>
</html>