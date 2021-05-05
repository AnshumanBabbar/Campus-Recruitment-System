<?php
$pageHeading="DELETE VACANCY";
include("dashboard.html");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CRMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./delete-vacancy.css?ver=<?php echo rand(111,999)?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body>


 
 
 
 <div  class = "frm-1">
 
 
  <div class="container-1">
  
  <form class="search" action="#">
  <input type="text" placeholder="Search by job title.." name="search">
  <button type="submit" id="search"><i class="fa fa-search"></i></button>
  <button type="submit" id="delete" >Delete</button>
  
</form>
   <table id="t01" style="width:96%">
  <tr>
    <th>S.No</th>
    <th>Job Title</th>
    <th>Job Applied By</th>
	<th>Action</th>
	
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
	<td></td>
  </tr>
  
</table>

  
  
  
     </div>
  </div>

 
 
 
 

 </body>
  

 <script src="add-vacancy.js"></script>

 </html>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 