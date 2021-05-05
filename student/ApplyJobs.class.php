<?php
class ApplyJobs{
    
    private $applyJobId;
    private $userId;
    private $jobId;
    private $compId;
    private $status;
    private $compName;
    private $jobTitle;
        
   
        
       
        public static function displayTable($connection,$Usr_id){
         $cnt=1;
        
        $sqlCmd = "SELECT applyjob_id,companyname,jobtitle,status,applyjob.job_id as jid from applyjob JOIN vacancy on applyjob.job_id=vacancy.job_id JOIN company on vacancy.comp_id=company.comp_id where applyjob.usr_id='$Usr_id'";
        foreach ($connection -> query($sqlCmd) as $oneRec){
            echo "<tr><td>$cnt</td><td>".$oneRec["applyjob_id"]."</td>"."<td>".$oneRec["companyname"]."</td>"."<td>".$oneRec["jobtitle"]."</td>"."<td>".$oneRec["status"]."</td>"."<td><a href='View-details.php?jobid=".$oneRec['jid']."'>View Details</a></td></tr>";
            
            $cnt++;
        }
      
    }
        
        
    }
    



?>
