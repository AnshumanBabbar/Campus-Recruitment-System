<?php
session_start();
error_reporting(0);

//require_once('../includes/dbconfig.php');
if(isset($_GET["submit"])){
    $email=$_GET["email"];
    $password=$_GET["password"];
    global $connectId;
    
    require_once 'Admin.Class.php';
require_once 'dbconfig.php';

try{
    $connection=new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);
     
    if($email!="" && $password!="" ){
        
           $admin=new Admin();
           
           $admin->setEmail($email);
           $admin->setPassword($password);
          
           $result=$admin->findAdminFromDB($connection) ;
    if($result!=""){
            $msg="Details Matched";
          
        $_SESSION["admin_id_session"]=$result;
	   echo $_SESSION["admin_id_session"];
       header('location:AdminDashboard.php');
        }
        
        else{
            $msg="Details Not Found";
        }
        
        }
       
    
    else{
        
        $msg="All fields must be filled ";
    }
    
  
     
}
catch(PDOException $e){
    echo "You are not connected to $dbname database <br/>";
}
    
    
    
    ////////////////////////////////
 
    
    
        
    }

       
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Sign In</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" type="image/png" href="./img/logo.png">	
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../css/style3.css?ver=">
        
        <style>
            .msg p{
                
                margin-left: 90px;
                color: red;
            }
            
            body{
                background-color: #fff;
                background-image: url(../img/adminBack.jpg)
            }
                
            .wrapper1 {
  border:4px solid #0c6698;
  margin:50px auto;
  width: 375px; 
  height: 300px; 
  border-radius:5px;
 float : right;
    margin-right: 450px;
    margin-top: 100px;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
    padding-top: 30px;
    box-shadow: 3px 3px #0c6698;
    
}


.wrapper1 h1{
  font-family: 'Galada', cursive;
  color:#0c6698;
  letter-spacing:8px;
  text-align:center;
  padding-top:5px;
  padding-bottom:5px;
}
.wrapper1 hr{
  opacity:0.2;
  
            }
           
            
            
            .wrapper1:hover{
                border:3px solid #0c6698;
                background-color: #fff;
            }
            
            
        </style>
        
	</head>

<div class="parent-wrapper">

<div class="wrapper1">
     
          <div class="msg">
                <p><?php
                   if($msg){
                       echo "$msg";
                   }
               
                ?>        </p>
                </div>
  <h1><u>ADMIN LOGIN</u></h1>
  <hr>
    
  <form method="get" >
    <label id="icon" for="username"><i class="fa fa-user"></i></label>
    <input type="text" placeholder="Registered Email" name="email" id="username">
    <label id="icon" for="password"><i class="fa fa-key"></i></label>
    <input type="password" name="password" placeholder="Password" id="password">
    <input name="submit" type="submit" value="Let Me Enter!">
    
     
   
</div>
</div>
</html>