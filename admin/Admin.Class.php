<?php 


class Admin{
    
    private $Admin_id;
    private $Adminname;
    private $Email;
    private $Mobile;
    private $Password;
    private $Username;
    
    function __construct($admin_id=null,$adminname=null,$email=null,$mobile=null,$password=null,$username=null){
        
        
        $this->Adminname=$adminname;
        $this->Admin_id=$admin_id;
        $this->Email=$email;
        $this->Mobile=$mobile;
        $this->Password=$password;
        $this->Username=$username;
    }
    
    function getAdminId(){return  $this->Admin_id;}
    
    function getAdminName(){return $this->Adminname;}
    
    function getEmail(){return $this->Email;}
    
    function getMobile(){return $this->Mobile;}
    
    function getPassword(){ return $this->Password; }
    function getUsername(){return $this->Username;}
    
    function setAdminId($adminId){ $this->Admin_id=$adminId; }
    
    function setAdminname($adminname){ $this->Adminname=$adminname; }
    
    function setEmail($email){$this->Email=$email;}
    
    function setMobile($mobile){ $this->Mobile=$mobile; }
    
    function setPassword($password){$this->Password=$password;}
    
    function setUsername($username) { $this->Username=$username;}
    
    
    
    public function findAdminFromDB($connection){
        
        $email=$this->Email;
        $password=$this->Password;
        $sqlCmd="select admin_id as aid from admin as aid where email=:p and password=:p1";
        $prepare=$connection->prepare($sqlCmd);
        $prepare->bindValue(":p",$email,PDO::PARAM_STR);
        $prepare->bindValue(":p1",$password,PDO::PARAM_STR);
        $prepare->execute();
        $result=$prepare->fetchAll();
        
        $ans="";
        if(sizeof($result)>0){
            foreach ($result as $oneRec) {
                $ans=$oneRec["aid"];
            }
        }
    return $ans;
}
    
    public function findTotalCompanies($connection){
        
    $result=0;
        
        $sqlCmd = "select count(*) as total from company ";
        foreach ($connection -> query($sqlCmd) as $oneRec){
           $result=$oneRec["total"];
            
            
        }
        return $result;
        
    }
    
        public function findTotalUsers($connection){
        
    $result=0;
        
        $sqlCmd = "select count(*) as total from user ";
        foreach ($connection -> query($sqlCmd) as $oneRec){
           $result=$oneRec["total"];
            
            
        }
        return $result;
        
    }
    
           public function findTotalVacancies($connection){
        
    $result=0;
        
        $sqlCmd = "select count(*) as total from vacancy ";
        foreach ($connection -> query($sqlCmd) as $oneRec){
           $result=$oneRec["total"];
            
            
        }
        return $result;
        
    }
    
    
    public function displayAllCompanies($connection){
        $cnt=1;
        
        $sqlCmd = "select companyname as compname,companyurl as url,comp_id as cid from company";
        foreach ($connection -> query($sqlCmd) as $oneRec){
            echo "<tr><td>$cnt</td><td>".$oneRec["compname"]."</td>"."<td>".$oneRec["url"]."</td>"."<td><a href='view-company-details.php?viewid=".$oneRec['cid']."'>View Details</a></td></tr>";
            
            $cnt++;
        }
    
}
        public function displayAllUsers($connection){
        $cnt=1;
        
        $sqlCmd = "select fullname as fname,email as em,usr_id uid from user";
        foreach ($connection -> query($sqlCmd) as $oneRec){
            echo "<tr><td>$cnt</td><td>".$oneRec["fname"]."</td>"."<td>".$oneRec["em"]."</td>"."<td><a href='view-user-details.php?viewid=".$oneRec['uid']."'>View Details</a></td></tr>";
            
            $cnt++;
        }
    
}
    
    public function displayCompaniesDetails($connection,$cid){
        
        $sqlCmd="select companyname as name,contactperson as person,companyemail as email,companyurl as url,companyaddress as address,mobile as mb FROM company where comp_id='$cid'";
        
          foreach ($connection -> query($sqlCmd) as $oneRec){
              
            echo "<tr><td>Company Name</td><td>".$oneRec["name"]."</td></tr>"."<tr><td>Contact Person</td><td>".$oneRec["person"]."</td></tr>"."<tr><td>Company Url</td><td>".$oneRec['url']."</td></tr>"."<tr><td>Company Address</td><td>".$oneRec['address']."</td></tr>"."<tr><td>Mobile Number</td><td>".$oneRec['mb']."</td></tr>"."<tr><td>Email Address</td><td>".$oneRec['email']."</td></tr>";
            
            //echo "<li></li>"
            //$cnt++;
        }
        
    }
    
    
    
    public function displayUserDetails($connection,$uid){
        
        $sqlCmd="select fullname as fname,email,mobile as mb,gender as gen,sid as sid from user where usr_id='$uid'";
        
          foreach ($connection -> query($sqlCmd) as $oneRec){
             
              echo "<tr><td>Full Name</td><td>".$oneRec["fname"]."</td></tr>"."<tr><td>Email</td><td>".$oneRec["email"]."</td></tr>"."<tr><td>Mobile number</td><td>".$oneRec['mb']."</td></tr>"."<tr><td>Student ID</td><td>".$oneRec['sid']."</td></tr>"."<tr><td>Gender</td><td>".$oneRec['gen']."</td></tr>"."<tr><td>Email Address</td><td>".$oneRec['email']."</td></tr>";
            
            //$cnt++;
        }
        
    }
}
?>