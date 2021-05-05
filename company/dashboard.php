<?php
session_start();
error_reporting(0);
include('../includes/dbconfig.php');

 global $connectId;
if (strlen($_SESSION['comp_id_session']==0)) {

    echo "not found";
  } else{
    
    $cid= $_SESSION["comp_id_session"];
    $sqlStmt="select companyname from company where comp_id='$cid'";
    $queryId=mysqli_query($connectId, $sqlStmt);
    $rec=mysqli_fetch_array($queryId);
    $msg= strtoupper($rec[0]);
    $pageHeading=$msg." DASHBOARD";
            
    
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
    .logo{
        width: 200px;
        height: 100px;
    }
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
     <img src="../img/logo.png" class="logo">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br/><br/><br/><br/><br/><br/>
  
  <li class="dropdown"><a href="dashboard.php">
                <i class="fa fa-home" ></i>&nbsp;&nbsp;<span>
     
      Dashboard
      
      </span> 
      </a></li>
  <hr/>
  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span>Post Vacancy</span> &nbsp;&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li class="dropdown"><a href="add_vacancy.php"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<span>Add Detail</span></a></li>
            <li class="dropdown"><a href="manage-details.php"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;<span>Manage Detail</span></a></li>
    </ul>
      </li>
     <hr/>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span>Job Applications</span>&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
              
              <li class="dropdown"><a href="view-new-apllications.php"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;<span>New Applications</span></a></li>
              <li class="dropdown"><a href="view-rejected-apllications.php"><i class="fa fa-ban"></i>&nbsp;&nbsp;<span>Rejected Applications</span></a></li>
            <li class="dropdown"><a href="all-listed-applications.php"><i class="fa fa-globe"></i>&nbsp;&nbsp;<span>All Applications</span></a></li>
    </ul>
      </li>
    
</div>
<div id = "header">
    <span class="bars" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <span class="setting"><a href="edit-profile.php"><i class="fa fa-user-circle"></i></a>&nbsp;&nbsp;&nbsp;
    
    <a href="logout.php"><i class="fa fa-sign-out"></i></span></a>
    <h3 id="head"><i><?php echo   $pageHeading ?></i></h3>
   
</div>


    <div class="dc" id="dashboard-container">
    
        <div class="box-1">
        <span class="boxtext">Total Vacancy Posted<br><br>
        <?php
        
   $query1=mysqli_query($connectId,"Select * from vacancy where comp_id='$cid'");
$totalapplications=mysqli_num_rows($query1);
            echo $totalapplications;
            ?>
        </span>
        </div>
        <div class="box-2">
        <span class="boxtext">Total No. of Applications <br> <br>
            <?php
           $query1=mysqli_query($connectId,"Select * from applyjob,vacancy
           where vacancy.job_id=applyjob.job_id and vacancy.comp_id='$cid'");
            $totalapplications=mysqli_num_rows($query1);
            echo $totalapplications;
    
        ?>
        </span>
        </div>
        <div class="box-3">
        <span class="boxtext">Total No. of Rejected<br> Application<br><br>
            <?php
           $query1=mysqli_query($connectId,"Select * from applyjob,vacancy
           where vacancy.job_id=applyjob.job_id and vacancy.comp_id='$cid' and applyjob.status='rejected'");
            $totalapplications=mysqli_num_rows($query1);
            echo $totalapplications;?>
            
            </span>
        </div>
         <div class="box-4">
        <span class="boxtext">Total No. of Selected<br> Application<br><br>
               <?php
           $query1=mysqli_query($connectId,"Select * from applyjob,vacancy
           where vacancy.job_id=applyjob.job_id and vacancy.comp_id='$cid' and applyjob.status='selected'");
            $totalapplications=mysqli_num_rows($query1);
            echo $totalapplications;?>
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
