<?php

error_reporting(0);
require_once('../includes/dbconfig.php');
if(isset($_GET["submit"])){
    
  
  $compName=$_GET["companyname"];
    $contactPerson=$_GET["contactperson"];
    $email=$_GET["email"];
    $password=$_GET["password"];
    $rpassword=$_GET["repeatPassword"];
    $mobile=$_GET["telephone"];
    $companyURL=$_GET["companyUrl"];
    $address=$_GET["address"];
    
    
     global $connectId;
    
 
    
    if($compName!="" && $contactPerson!="" && $email!="" && $password!="" && $rpassword!="" && $mobile!="" && $companyURL!="" && $address!=""){
        if($password==$rpassword)
        {
            
       $sqlStmt = "INSERT INTO company VALUES ('','$compName', '$contactPerson', '$email', '$password', '$mobile', '$companyURL','$address')";
    
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
    
    
    
}


?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>employersignup</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" type="image/png" href="../img/logo.png">	
	

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../css/style1.css?ver=<?php echo rand(111,999)?>">
        <!--<script src="./js/script1.js"></script>-->
        <script src="./js/jquery-3.3.1.min.js"></script>
         <style>
            .msg p{
                
                color: red;
                font-size: 30px;
            }
        </style>
    </head>
<body>
        <div class="grid-form">
        <div class="img-left">
            <img src="../img/company-registration.jpg">
        </div>
        <div class="form-body">
		<div class="text-white">
                        <h1>Welcome Back !!</h1>
                        <p><center>Welcome back to Campus Recruitment System ...</center></p>
            </div>
            <hr/>
		    <form method="get" action="#">
            
            <input type="text" name="companyname" class="company" placeholder="Name Of Company ..." id="cmpany">
			
          
			<input type="text" name="contactperson" placeholder="Name Of Contact Person ..." id="person" onBlur="return ValidateAlphabets();" />
			<center><span id="lblError" style="color: red"></span></center>
			
			<input type="text" name="email" placeholder="Email of Company..."  id="email" onBlur="return ValidateEmail();" />
			<center><span id="lblError1" style="color: red"></span></center>
			
			<input type="password" name="password" placeholder="Enter Password ..." id="pass" onBlur="return ValidatePassword();" />
			<center><span id="lblError2" style="color: red"></span></center>
                
            
            <input type="password" name="repeatPassword" placeholder="Repeat Password ..." >
			
		
			<input type="text" name="telephone" placeholder="Enter your Mobile Number ..." id="phone" onBlur="return ValidatePhoneNo();" />
			<center><span id="lblError3" style="color: red"></span></center>
                
			<input type="text" name="companyUrl" placeholder="Enter Company Url ..." id="url" onBlur="return ValidateUrl();" />
			<center><span id="lblError4" style="color: red"></span></center>
                
            
            <input type="text" name="address" placeholder="Enter Address of Company ...">
			
            
             <input type="submit" name="submit" value="Submit">
		
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
   
    var person=document.getElementById("person").value;
    var lblError=document.getElementById("lblError");
    lblError.innerHTML="";
    var regex=/^[A-Z a-z0-9]+$/;
       var isValid=regex.test(person);
    if(!isValid){
        lblError.innerHTML="Only Alphabets and numbers allowed  for name ";
        
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
        
        function ValidatePassword(){
   var pass=document.getElementById("pass").value;
    
    var lblError2=document.getElementById("lblError2");
    lblError2.innerHTML="";
    //var regex=/^([0-9][a-z][A-Z]{8,20})?$/;
     var regex=/^[A-Za-z0-9]\w{7,14}$/;
        
    var isValid=regex.test(pass);
    if(!isValid){
        lblError2.innerHTML="Password is too short and maximum should be 20 characters";
    }
    
    
    }

function ValidatePhoneNo(){
    var phone=document.getElementById("phone").value;
    
    var lblError3=document.getElementById("lblError3");
    lblError3.innerHTML="";
    var regex=/^[0-9]+$/;
    var isValid=regex.test(phone);
    if(!isValid){
        lblError3.innerHTML="Phone no. should contain only numbers  ";
    }
    
   
}

function ValidateUrl(){
   var url=document.getElementById("url").value;
    
    var lblError4=document.getElementById("lblError4");
    lblError4.innerHTML="";
    var regex=/^(www.)[A-Z0-9a-z]+(.)[A-Za-z]+$/;
    var isValid=regex.test(url);
    if(!isValid){
        lblError4.innerHTML="URL should be in valid Format";
    }
    
    
    }

    

    </script>
</html>