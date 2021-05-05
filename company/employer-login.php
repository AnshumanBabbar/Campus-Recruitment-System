<?php
session_start();
error_reporting(0);
require_once('../includes/dbconfig.php');
if(isset($_GET["submit"])){
    
   $email=$_GET["email"];
    $password=$_GET["password"];
    
    
     global $connectId;
    
    //global $queryId;
    
    global $connectId;
    if($email!="" && $password!="" ){
       
    $sqlStmt="select * from company where companyemail='$email' and password='$password'";
    
    $queryId=mysqli_query($connectId, $sqlStmt);
    
    $count=mysqli_num_rows($queryId);
    
    
    if($count>0){
        $rec=mysqli_fetch_array($queryId);
        $_SESSION["comp_id_session"]=$rec[0];
	   echo $_SESSION["comp_id_session"];
       header('location:dashboard.php');
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

<html>

<head>
  <link rel="stylesheet" href="../css/style2.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Employer Sign In</title>
      <style>
            .msg p{
                
                margin-left: 135px;
                color: red;
            }
        </style>
</head>

<body>
    
  
  <div class="main">
    <p class="sign" align="center">Sign in</p>
         <div class="msg">
                <p><?php
                   if($msg){
                       echo "$msg";
                   }
               
                ?>        </p>
                </div>
    <form class="form1">
      <input class="un " type="text" align="center" name="email" placeholder="Registered Email">
      <input class="pass" type="password" name="password" align="center" placeholder="Password">
      <input type="submit" name="submit" class="submit" align="center" value="Sign in">
      <p class="forgot" align="center"><a href="employerSignUp.php">New Account</a>
        </p></form>   
                
    </div>
     
</body>

</html>