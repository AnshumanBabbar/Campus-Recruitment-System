<?php
session_start();
error_reporting(0);
//include('../includes/dbconfig.php');

 //global $connectId;
require_once 'dbconnection.php';
if (strlen($_SESSION['user_id_session']==0)) {

    echo "not found";
  } else{
    
    $uid= $_SESSION["user_id_session"];
   
?>

<?php 

require_once 'User.Class.php';
require_once 'JobDetail.class.php';
//require_once 'dbconfig.php';

try{
    $connection=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
     
    $user1=new User();
    
    $result=JobDetail::displayTotalAppliedJobs($connection,$uid);

    
    $result1=JobDetail::displayTotalNumberOfJobs($connection,$uid);
    $result2=JobDetail::displayTotalRejected($connection,$uid);
    $result3=JobDetail::displayTotalSelected($connection,$uid);

     $name=$user1->displayUserName($connection,$uid);
    $msg= strtoupper($name);
        $pageHeading=$msg." DASHBOARD"; 
     
}
catch(PDOException $e){
    echo "You are not connected to $dbname database <br/>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="../img/logo.png">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #fff;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  border-right: 10px solid #c4eaf2;
}

    #header {
        
        height:150px;
            width:100%;
           top: 0;
         left: 0;
        overflow-x: hidden;
        border-bottom: 10px solid #c4eaf2;
        background-color: #c4eaf2;
        
    }
    
    #head{
        margin-top: 80px;
        margin-left: 250px;
        font-family: cursive;
        font-weight: bold;
    }

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

    li{
        list-style: none;
    }

    .bars{
        float:left;
        padding: 20px;
        font-size: 40px;
    }
    
    span{
        font-size: 20px;
        font-family: cursive;
    }
    
    hr{
        width:80%;
        height:0px;
        border:none;
        border-top: 5px solid #c4eaf2;
    }
    
    .setting{
        float:right;
        padding:20px;
    }
    
    .fa{
        font-size: 40px;
    }

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
 
    
    .box-1,.box-2,.box-3,.box-4{
        float: left;
    display: block;
   
    padding: 18px;
  
    width: 250px;
    box-sizing: border-box;
    background-color: #fff;
    margin-top: 50px;
    margin-left: 19px;
    box-shadow:  5px 10px 18px #888888;
    
    min-height: 250px;
    }
    
    .box-1{
        background-color: #4285f4;
    }
    .box-1 span{
        color: #fff;
    } 
    .box-3{
          background-color: #f5f8fa;
    }
    
    .dc{
        
        width: 80%;
        background-color: red;
        z-index: 1;
      
    }
    .cmp-Name{

        font-family: cursive;
        color: #818181;
    }
    #head{
        margin-top: 80px;
        margin-left: 255px;
        font-family: cursive;
        font-weight: bold;
        color: #818181;
    }
    .logo{
        width: 200px;
        height: 100px;
    }

</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
    <img src="../img/logo.png"/ class="logo">
    <a href="javascript:void(0)" class="closebtn" id="closebtn" onclick="closeNav()">&times;</a><br/><br/>
  
  <li class="dropdown"><a href="UserDashboard.php">
                <i class="fa fa-home" ></i>&nbsp;&nbsp;<span>Dashboard</span> 
      </a></li>
  <hr class="hr1"/>
  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span>Education Form</span> &nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li class="dropdown"><a href="add_education_detail.php"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<span>Add Detail</span></a></li>
            <li class="dropdown"><a href="manage-details.php"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;<span>Manage Detail</span></a></li>
    </ul>
      </li>
     <hr  class="hr1"/>
      <li class="dropdown"><a href="ViewVacancy.php"><span>View Vacancy</span></a>
          
      </li>
    <hr class="hr1"/>
    <li class="dropdown"><a href="History-Of-Applied-Jobs.php"><span>History of Applied Jobs</span></a>
          
      </li>
    
</div>
<div id = "header">
    <span class="bars" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <span class="setting">
        <a href="edit-profile.php"><i class="fa fa-user-circle"></i></a>&nbsp;&nbsp;&nbsp;
    <a href="logout.php"><i class="fa fa-sign-out"></i></span></a>
    <h3 id="head"><i><?php echo   $pageHeading ?></i></h3>
   
</div>





    <div class="dc" id="dashboard-container">
    
        <div class="box-1">
        <span class="boxtext">Total Applied Jobs<br><br>
        <?php
        echo $result;
  
            ?>
        </span>
        </div>
        <div class="box-2">
        <span class="boxtext">Total Vacancy <br> <br>
            <?php
        
        echo $result1;
    /*
           $query1=mysqli_query($connectId,"Select * from applyjob,vacancy
           where vacancy.job_id=applyjob.job_id and vacancy.comp_id='$cid'");
            $totalapplications=mysqli_num_rows($query1);
            echo $totalapplications;*/
    
        ?>
        </span>
        </div>
        <div class="box-3">
        <span class="boxtext">Total No. of Rejected<br> Application<br><br>
            <?php
            echo $result2;
        /*
           $query1=mysqli_query($connectId,"Select * from applyjob,vacancy
           where vacancy.job_id=applyjob.job_id and vacancy.comp_id='$cid' and applyjob.status='rejected'");
            $totalapplications=mysqli_num_rows($query1);
            echo $totalapplications;  */?>
            
            </span>
        </div>
         <div class="box-4">
        <span class="boxtext">Total No. of Selected<br> Application<br><br>
               <?php
               echo $result3;
        /*
           $query1=mysqli_query($connectId,"Select * from applyjob,vacancy
           where vacancy.job_id=applyjob.job_id and vacancy.comp_id='$cid' and applyjob.status='selected'");
            $totalapplications=mysqli_num_rows($query1);
            echo $totalapplications; */?>
            </span>
        </div>
    </div>

</body>
    
    

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("header").style.marginLeft="250px";
  document.getElementById("header").style.marginLeft="0px";
 document.getElementById("dashboard-container").style.marginLeft="250px";
  
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("header").style.marginLeft="0px";
  document.getElementById("head").style.marginLeft="260px";
    document.getElementById("dashboard-container").style.marginLeft="0px";
}
</script>
   
</html>

<?php } ?>
