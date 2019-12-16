<?php
class UserInformation
{
    private $con;
    public $id;

    public function __construct(Conexion $con)
    {
        $this->con = $con;
    }

    public function setId(String $id)
    {
        $this->id = $this->con->real_escape_string($id);
    }

    public function getUserInfo()
    {
       $consultUser = $this->consultUser();
       
        if($this->consultUser()){
            return $consultUser;      
        }else{
            return false;  
        }    
        
    }   
    public function consultUser()
    {
        $query = "SELECT * FROM users WHERE id = '$this->id'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }
   
}

?>