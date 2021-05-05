<?php

error_reporting(0);
require_once('../includes/dbconfig.php');
if(isset($_GET["submit"])){
    
   $name=$_GET["txtName"];
    $email=$_GET["email"];
    $gender=$_GET["gender"];
    $mobile=$_GET["phone"];
    $sid=$_GET["sid"];
    $password=$_GET["password"];
    $cpassword=$_GET["cnfrmpassword"];
    
    
     global $connectId;
    
    //global $queryId;
    
    if($name!="" && $email!="" && $mobile!="" && $sid!="" && $password!="" && $cpassword!="" ){
        if($password==$cpassword){
       $sqlStmt = "INSERT INTO user VALUES ('','$name', '$email', '$mobile', '$gender', '$password', '$sid')";
    
    $queryId=mysqli_query($connectId, $sqlStmt);  
          if($queryId==true){
        
        $msg="User added successfully! <br";
        //echo "One row is added successfully! <br/>";
    }
    else{
        echo mysqli_error($connectId);
    }
    }
    
    else{
        $msg="Password should be same";
    }
        
    }
    
    else{
        
        $msg="All fields must be filled ";
    }
    
    
   
    
   mysqli_close($connectId);
    
  
            
    //echo "chala";
    
}


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>usersignup</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../css/style.css?ver=<?php echo rand(111,999)?>">
      <!--<script src="../js/script.js"></script>-->
    <script src="../js/jquery-3.3.1.min.js"></script>
       
        <style>
            .msg p{
                
                color: red;
                font-size: 30px;
            }
        </style>
        
	</head>

	<body>

		<div class="wrapper" style="background-image: url('../img/signupBack.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="../img/signup.jpg" alt="signup">
                    
                   
				</div>
				<form method="get" action="#">
					<h3>STUDENT SIGN UP !</h3>
					
					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" id="txtName" name="txtName" onBlur="return ValidateAlphabets();"/>
						<i class="fa fa-user" style="font-size: 17px"></i>
                        <span id="lblError" style="color: red"></span>
                        
                      </div>
                       
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address" class="form-control" id="email" name="email" onBlur="return ValidateEmail();"/>
						<i class="fa fa-envelope" style="font-size: 17px"></i>
                        <span id="lblError1" style="color: red"></span>
					</div>
					<div class="form-wrapper">
						<select name="gender" id="" class="form-control">
							<option value="" disabled >Gender</option>
							<option selected value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="fa fa-venus-mars" style="font-size: 17px"></i>
					</div>
                    <div class="form-wrapper">
						<input type="text" placeholder="Mobile No" class="form-control" id="phone" name="phone" onBlur="return ValidatePhoneNo();"/>
						<i class="fa fa-phone" style="font-size: 17px"></i>
                        <span id="lblError2" style="color: red"></span>
					</div>
                    <div class="form-wrapper">
						<input type="text" name="sid" placeholder="Student Id" id="sid" class="form-control" onBlur="return ValidateStudentId();" />
						<i class="fa fa-id-card" style="font-size: 17px"></i>
                        <span id="lblError3" style="color: red"></span>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="password" id="pass1" onBlur="return ValidatePassword();"/>
						<i class="fa fa-key" style="font-size: 17px"></i>
                        <span id="lblError4" style="color: red"></span>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control" name="cnfrmpassword">
						<i class="fa fa-key" style="font-size: 17px"></i>
					</div>
                    <div class="btn">
                    
					<input type="submit" value="Register" name="submit" class="register">
                        <div></div></div>
                    
                    
                 <div class="msg">
                <p><?php
                   if($msg){
                       echo "$msg";
                   }
               
                ?>        </p>
                </div>
				</form>
                
               
			</div>
              
        </div>
   
	</body>
        <script>
            
            function ValidateAlphabets(){
   
    var username=document.getElementById("txtName").value;
    var lblError=document.getElementById("lblError");
    lblError.innerHTML="";
    var regex=/^[A-Za-z0-9]+$/;
    var isValid=regex.test(username);
    if(!isValid){
        lblError.innerHTML="Only Alphabets allowed";
    }
    
     return isValid;
    
    
    }

   function ValidateEmail(){
   
    var email=document.getElementById("email").value;
    var lblError1=document.getElementById("lblError1");
    lblError1.innerHTML="";
    var regex=/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
    var isValid=regex.test(email);
    if(!isValid){
        
        lblError1.innerHTML="Valid email allowed";
    }
    return isValid;
    
    }

function ValidatePhoneNo(){
    var phone=document.getElementById("phone").value;
    
    var lblError2=document.getElementById("lblError2");
    lblError2.innerHTML="";
    var regex=/^[0-9]+$/;
    var isValid=regex.test(phone);
    if(!isValid){
        lblError2.innerHTML="Phone no. should contain only numbers  ";
    }
    
   
}

function ValidateStudentId(){
   var id=document.getElementById("sid").value;
    
    var lblError3=document.getElementById("lblError3");
    lblError3.innerHTML="";
    var regex=/^[0-9]+$/;
    var isValid=regex.test(id);
    if(!isValid){
        lblError3.innerHTML="Must contan numbers";
    }
    
    
    }


            </script>
</html>
