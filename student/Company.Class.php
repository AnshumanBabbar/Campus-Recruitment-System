<?php 
class Company{
    
    private $Comp_id;
    private $Companyname;
    private $Contactperson;
    private $Mobile;
    private $Companyurl;
    private $Companyaddress;
    
    
    private $Job_id;
    private $Jobtitle;
    private $Jobdescription;
    private $joblocation;
    private $Monthlysalary;
    
    function __construct(){}
    function getCompId(){return $this->Comp_id;}
    function getCompName(){return $this->Companyname;}
    
    function getContactPerson(){return $this->Contactperson;}
    
    function getMobile(){return $this->Mobile;}
    function getEmail() {return  $this->email;}
    
    function setCompId($Comp_id){$this->Comp_id=$Comp_id;}
    
    
    public static function displayAllVacancies($connection){
        $cnt=1;
        
        $sqlCmd = "select company.comp_id as comp,company.companyname as name,vacancy.job_id,vacancy.jobtitle from company join vacancy on company.comp_id=vacancy.comp_id";
        foreach ($connection -> query($sqlCmd) as $oneRec){
            
            //$company=new Company();
            
          //  echo $oneRec["comp"]."  ".$oneRec["name"];
            
            
            /*    echo "<tr><td>$cnt></td><td>$rec[1]</td>
                  <td>$rec[2]</td>
                  <td><a href='view-applied-apllications.php?viewid="."$rec['applyjob_id']".">View Details</a></td>
                </tr>*/
        }
      
    }
}
    

?>