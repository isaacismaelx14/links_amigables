<?php
class Login
{
    private $con;
    public $user;
    public $password;

    public function __construct(Conexion $con)
    {
        $this->con = $con;
    }

    public function setUser(String $user)
    {
        $this->user = $this->con->real_escape_string($user);
    }

    public function setPassword(String $pass)
    {
        $this->pass = $pass;
    }

    public function signIn()
    {
       $consultUser = $this->consultUser();
       $consultEmail = $this->consultEmail();
       
        if($this->consultUser()){
            if($this->PasswordVerify($consultUser['password'])){
                return $consultUser;  
            }
            
        }else{
            if($this->consultEmail()){  
             if($this->PasswordVerify($consultEmail['password'])){
                return $consultEmail;   
            }
            }
        }    
        return false;
    }   
    public function consultUser()
    {
        $query = "SELECT * FROM users WHERE user = '$this->user'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    public function consultEmail()
    {
        $query = "SELECT * FROM users WHERE email = '$this->user'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    
    public function isAffectedRows():bool
    {
        return ($this->con->affected_rows > 0);
    }

    public function PasswordVerify($password):bool
    {
        return password_verify($this->pass, $password);
    }
}

?>