<?php 
class User{
    
    private $usr_id;
    private $Fullname;
    private $Email;
    private $Mobile;
    private $Gender;
    private $Password;
    private $Sid;
    private $edu_id;
    private $SchoolBoard;
    private $SchoolPercent;
    private $SchoolYear;
    private $CollegeName;
    private $CollegePercent;
    private $CollegeYear;
    private $UniversityName;
    private $UniversityPercent;
    private $UniversityYear;
    private $Skills;
    private $Certifications;
  
    
    
    function  __construct($usr_id = null ,$schoolboard = null,$schoolpercent = null,$schoolyear=null,$collegename = null,$collegepercent = null,$collegeyear=null,$universityname = null,$universitypercent = null,$universityyear=null,$skills = null,$certifications = null)
    {
        $this->usr_id=$usr_id;
       // $this->edu_id=$edu_id;
        $this->SchoolBoard=$schoolboard;
        $this->SchoolPercent=$schoolpercent;
        $this->SchoolYear=$schoolyear;
        $this->CollegeName=$collegename;
        $this->CollegePercent=$collegepercent;
        $this->CollegeYear=$collegeyear;
        $this->UniversityName=$universityname;
        $this->UniversityPercent=$universitypercent;
        $this->UniversityYear=$universityyear;
        $this->Skills=$skills;
        $this->Certifications=$certifications;
        
        
        
    }
    
    function getUserID()
    {
        return $this->usr_id;
    }
    function getEdu_ID()
    {
        return $this->edu_id;
    }
    function getSchoolBoard()
    {
        return $this->SchoolBoard;
    }
    function getSchoolYear()
    {
        return $this->SchoolYear;
    }
    function getSchoolPercent()
    {
        return $this->SchoolPercent;
    }
    function getCollegeName()
    {
        return $this->CollegeName;
    }
    function getCollegeYear()
    {
        return $this->CollegeYear;
    }
    function getCollegePercent()
    {
        return $this->CollegePercent;
    }
    function getUniversityName()
    {
        return $this->UniversityName;
    }
    function getUniversityYear()
    {
        return $this->UniversityYear;
    }
    function getUniversityPercent()
    {
        return $this->UniversityPercent;
    }
    function getSkills()
    {
        return $this->Skills;
    }
    function getCertifications()
    {
        return $this->Certifications;
    }
    
    
    
    
    
    
    function setUserID($usr_id)
    {
        $this->usr_id= $usr_id;
    }
    function setFullName($FullName)
    {
        $this->FullName=$FullName;
    }
    function setEmail($Email)
    {
        $this->Email=$Email;
    }
    function setMobile($Mobile)
    {
        $this->Mobile=$Mobile;
    }
    function setGender($Gender)
    {
        $this->Gender=$Gender;
    }
    function setPwd($Password)
    {
        $this->Password=$Password;
    }
    
    function setEduID($edu_id)
    {
        $this->edu_id=$edu_id;
    }
    function setSchoolBoard($schoolboard)
    {
        $this->SchoolBoard=$schoolboard;
    }
    function setSchoolPercent($schoolpercent)
    {
        $this->SchoolPercent=$schoolpercent;
    }
    function setSchoolYear($schoolyear)
    {
        $this->SchoolYear=$schoolyear;
    }
    function setCollegeName($collegename)
    {
        $this->CollegeName=$collegename;
    }
    function setCollegePercent($collegepercent)
    {
        $this->CollegePercent=$collegepercent;
    }
    function setCollegeYear($collegeyear)
    {
        $this->CollegeYear=$collegeyear;
    }
    function setUniversityName($universityname)
    {
        $this->UniversityName=$universityname;
    }
    function setUniversityPercent($universitypercent)
    {
        $this->UniversityPercent=$universitypercent;
    }
    function setUniversityYear($universityyear)
    {
        $this->UniversityYear=$universityyear;
    }
    function setSkills($skills)
    {
        $this->Skills=$skills;
    }
    function setCertifications($certifications)
    {
        $this->Certifications=$certifications;
    }
    

 
       public  function displayUserName($connection,$Usr_id){
        
        $sqlCmd="select fullname as fname from user where usr_id='$Usr_id'";
        
        $result="";
        foreach ($connection -> query($sqlCmd) as $oneRec){
           
            
            $result=$oneRec["fname"];
           // echo $oneRec["total"];
        }
        return $result;
        
    }
    

    function updateUser($connection )
    {
       $usr_id = $this->usr_id;
        $FullName = $this ->FullName;
        $Gender = $this->Gender;
        $Email= $this->Email;
        $Mobile = $this->Mobile;
        $Password= $this->Password;
        
        $sqlCmd = "update  user set fullname = '$FullName',email = '$Email',mobile = '$Mobile' ,password = '$Password' ,gender='$Gender' where usr_id =$usr_id";
        $result =$connection->exec($sqlCmd);
        return $result;
    }
    
    public  function AddEducation($connection)
    {
        $usr_id=$this->usr_id;
        //$edu_id = $this->edu_id;
        $SchoolBoard = $this ->SchoolBoard;
        $SchoolPercent = $this->SchoolPercent;
        $SchoolYear = $this->SchoolYear;
        $CollegeName = $this ->CollegeName;
        $CollegePercent = $this->CollegePercent;
        $CollegeYear = $this->CollegeYear;
        $UniversityName = $this ->UniversityName;
        $UniversityPercent = $this->UniversityPercent;
        $UniversityYear = $this->UniversityYear;
        $Skills= $this->Skills;
        $Certifications = $this->Certifications;
        
        
        
        $sqlCmd = "INSERT INTO education VALUES ('', '$usr_id', '$SchoolBoard', '$SchoolYear', '$SchoolPercent', '$CollegeName', '$CollegeYear', '$CollegePercent', '$UniversityName', '$UniversityPercent', '$UniversityYear', '$Certifications', '$Skills')";
        $result =$connection->exec($sqlCmd);
      return $result;
    
        
    }
    
    public function getEduDetailById($connection,$usr_id)
    {
        
        $sqlCmd="select educationid,schoolboard,collegename,universityname,skills,certifications  from education where usr_id = $usr_id ";
        $cnt = 1;
        foreach ($connection -> query($sqlCmd) as $oneRec){
            
            echo "<tr>
<td>$cnt</td>
 
  <td>".$oneRec['schoolboard']."</td>
  
  <td>".$oneRec['collegename']."</td>
  
  
  <td >".$oneRec['universityname']."</td>
  
  
  <td>".$oneRec['skills']."</td>
  
  <td>".$oneRec['certifications']."</td>



  </tr>
  
   ";
         $cnt = $cnt +1;   
        }
    }
    
    function updateEducation($connection)
    {
        $usr_id=$this->usr_id;
        $edu_id = $this->edu_id;
        $SchoolBoard = $this ->SchoolBoard;
        $SchoolPercent = $this->SchoolPercent;
        $SchoolYear = $this->SchoolYear;
        $CollegeName = $this ->CollegeName;
        $CollegePercent = $this->CollegePercent;
        $CollegeYear = $this->CollegeYear;
        $UniversityName = $this ->UniversityName;
        $UniversityPercent = $this->UniversityPercent;
        $UniversityYear = $this->UniversityYear;
        $Skills= $this->Skills;
        $Certifications = $this->Certifications;
        
      
        
        $sqlCmd = "update  education set  schoolboard = '$SchoolBoard',schoolyear = '$SchoolYear',schoolpercent ='$SchoolPercent',collegename = '$CollegeName',collegeyear ='$CollegeYear',collegepercent='$CollegePercent',universityname='$UniversityName',universitypercent='$UniversityPercent',universityyear='$UniversityYear',skills='$Skills',certifications='$Certifications'  where usr_id =$usr_id";
        $result =$connection->exec($sqlCmd);
        return $result;
    }

    
    public static function displayUser($connection,$UserId){
        
        
        $sqlCmd = "select * from user where usr_id='$UserId'";
        
        foreach ($connection -> query($sqlCmd) as $oneRec){
         echo "<tr><th>Full Name</th>"."<td>".$oneRec["fullname"]."</td>"."<th>Email</th><td>".$oneRec["email"]."</td>"."</tr><tr><th>Mobile Number</th>"."<td>".$oneRec["mobile"]."</td>"."<th>Student ID </th><td>".$oneRec["sid"]."</td></tr><tr><th>Gender</th>"."<td>".$oneRec["gender"]."</td></tr>";
            
           /* echo "<tr><th>Full Name</th><td></td><th>Email</th<td></td></tr>";*/
    }
        
        
    }
}

?>