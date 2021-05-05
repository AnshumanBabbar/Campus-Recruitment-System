<?php 
class Main{
    
    private $id;
    private $title;
    private $description;
    
    private $address;
    private $mobile;
    private $email;
    
    public static function displayabout($connection){
        
        $sqlCmd="select * from aboutus";
        
        foreach ($connection -> query($sqlCmd) as $oneRec){
            
            echo "<tr>
  <th ><h2>".$oneRec['title']."</h2></th>
</tr>
<tr><hr/></tr>

<tr>
  <td><i>".$oneRec['description']."</i></td>
  </tr>
  
   ";
            
        }
    }
    
    public static function displaycontact($connection){
        
        $sqlCmd="select * from contact";
        
        foreach ($connection -> query($sqlCmd) as $oneRec){
            
            echo "<tr >

<th> Address: </th>
</tr>
<tr>
  <th >".$oneRec['address']."</th>
</tr>

<tr>
<th> Mobile: </th>
</tr>
<tr>
  <th >".$oneRec['mobile']."</th>
</tr>
<tr>
<th> Email: </th>
</tr>
<tr>
  <th >".$oneRec['email']."</th>
</tr>
<tr><hr/></tr>
      

      
   ";
            
        }
    }
}
    ?>
