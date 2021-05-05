<?php 
class JobDetail{
    
    private $JobId;
    private $JobTitle;
    private $JobDesc;
    private $Location;
    private $NoOfOpening;
    private $MonthlySalary;
    private $Status;

     public static function displayJob($connection,$jobId,$usrId){
        
      
        
        $sqlCmd = "select jobtitle,jobdescription,joblocation,monthlysalary,joblocation,noofopening,status from vacancy join applyjob on vacancy.job_id=applyjob.job_id where vacancy.job_id='$jobId' and usr_id='$usrId'";
         
        foreach ($connection -> query($sqlCmd) as $oneRec){
           echo "<tr><th>Job Title</th><td>".$oneRec["jobtitle"]."</td>"."<th>Monthly In-hand Salary</th><td>".$oneRec["monthlysalary"]."</td></tr><tr><th>Job Descriptions</th><td colspan='3'>".$oneRec["jobdescription"]."</td></tr><tr><th>Job Location</th><td>".$oneRec["joblocation"]."</td>"."<th>No of Opening</th><td>".$oneRec["noofopening"]."</td></tr><tr><th>Status</th><td>".$oneRec["status"]."</td>"."<th>Education Details </th><td><a href='manage-details.php'>View Education Details</a></td></tr>";
            
           
            
        }
        
    }
      
    public static function displayAllVacancies($connection){
        $cnt=1;
        
        $sqlCmd = "select company.comp_id as comp,company.companyname as name,vacancy.job_id as jid,vacancy.jobtitle as jobtitle from company join vacancy on company.comp_id=vacancy.comp_id";
        foreach ($connection -> query($sqlCmd) as $oneRec){
            echo "<tr><td>$cnt</td><td>".$oneRec["name"]."</td>"."<td>".$oneRec["jobtitle"]."</td>"."<td><a href='view-vacancy-details.php?viewid=".$oneRec['jid']."'>Apply for job</a></td></tr>";
            
            $cnt++;
        }  
}

public static function checkJobApplied($connection,$job_id,$user_id){
    
    $result=0;
    $sqlCmd="select count(*) as total from applyjob where applyjob.usr_id='$user_id' and applyjob.job_id='$job_id'";
    
    foreach ($connection -> query($sqlCmd) as $oneRec){
           
            
            $result=$oneRec["total"];
           // echo $oneRec["total"];
        }
        return $result;
    
}

public static function displayVacancyDetails($connection,$job_id){
        
    $sqlCmd="SELECT company.comp_id,company.companyname as compname ,vacancy.jobtitle as jobtitle ,vacancy.jobdescription as jobdesc,vacancy.monthlysalary as jobsal,vacancy.joblocation as jobloc,vacancy.noofopening as jobopenings FROM company,vacancy where company.comp_id=vacancy.comp_id and vacancy.job_id='$job_id'";
      
     foreach ($connection -> query($sqlCmd) as $oneRec){
         
      echo "<tr>
<th width='200'>Job Title</th>
<td>".$oneRec['jobtitle']."</td>
<th>Company Name</th>
<td>".$oneRec['compname']."</td>
</tr>
<tr>
<th>Job Descriptions</th>
<td colspan='3'>".$oneRec['jobdesc']."</td>
</tr>

<tr>
<th>Monthly In-hand Salary</th>
<td>".$oneRec['jobsal']."</td>
<th>Job Location</th>
<td>".$oneRec['jobloc']."</td>
</tr>
<tr>
<th>No of Opening</th>
<td colspan='3'>".$oneRec['jobopenings']."</td>
</tr>
";
        
}
}

public static function applyForNewJob($connection,$job_id,$user_id){
    $sqlCmd="INSERT INTO applyjob VALUES('','$job_id','$user_id','',null)";
    
     $result = $connection->exec($sqlCmd);
    return  $result;
    
}


///////////////////////////////////////////////////

public static function displayTotalNumberOfJobs($connection,$Usr_id){
    $result=0;
    
    $sqlCmd = "select count(job_id) as total from vacancy ";
    foreach ($connection -> query($sqlCmd) as $oneRec){
       $result=$oneRec["total"];
        
        
    }
    return $result;
}


public static function displayTotalAppliedJobs($connection,$Usr_id){
    
    $sqlCmd="SELECT count(*) as total FROM `applyjob` WHERE usr_id='$Usr_id'";
    
    $result=0;
    foreach ($connection -> query($sqlCmd) as $oneRec){
       
        
        $result=$oneRec["total"];
    }
    return $result;
    
}

public static function displayTotalRejected($connection,$Usr_id){
    
    $sqlCmd="SELECT count(*) as total FROM `applyjob` WHERE usr_id='$Usr_id' and status='rejected'";
    
    $result=0;
    foreach ($connection -> query($sqlCmd) as $oneRec){
       
        
        $result=$oneRec["total"];
    }
    return $result;
    
}

public static function displayTotalSelected($connection,$Usr_id){
    
    $sqlCmd="SELECT count(*) as total FROM `applyjob` WHERE usr_id='$Usr_id' and status='selected'";
    
    $result=0;
    foreach ($connection -> query($sqlCmd) as $oneRec){
       
        
        $result=$oneRec["total"];
    }
    return $result;
    
}


}
?>
