<?php
class RestorePassword
{
    private $con;
    public $email;

    public function __construct(Conexion $con)
    {
        $this->con = $con;
    }

    public function setEmail(String $email)
    {
        $this->email = $this->con->real_escape_string($email);
    }


    public function consultIfExist()
    {
       $consultEmail = $this->consultEmail();
       
            if($this->consultEmail()){  
                return $consultEmail;   
            }
         
        return false;
    }   

    public function consultEmail()
    {
        $query = "SELECT * FROM users WHERE email = '$this->email'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    
    public function isAffectedRows():bool
    {
        return ($this->con->affected_rows > 0);
    }

}

?>