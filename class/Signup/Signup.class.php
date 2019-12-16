<?php
class Signup
{
    private $con;
    public $user;
    public $email;
    public $name;
    public $lastName;
    public $password;
    public $repeatPassword;

    public function __construct(Conexion $con)
    {
        $this->con = $con;
    }

    public function setUser(String $user)
    {
        $this->user = $user;
    }

    public function setEmail(String $email)
    {
        $this->email = $email;
    }

    public function setName(String $name)
    {
        $this->name = $name;
    }

    public function setLastName(String $lastName)
    {
        $this->lastName = $lastName;
    }


    public function setPassword(String $pass)
    {
        $this->password = password_hash($pass, PASSWORD_DEFAULT);
    }

    public function signUp():bool
    {
        $sql = "INSERT INTO users (name,lastname,user, email, password) VALUES ('$this->name','$this->lastName','$this->user','$this->email','$this->password')";
        if ($this->con->query($sql) === true) {
           return true;
        }else{
           return false;
        }
        
    }
    public function comprobarSiExisteUser():bool
    {
       $consultUser = $this->consultUser();
       
        if($this->consultUser()){
            return true;
            
        }else{
            return false;
        }    
        
    } 
    
    public function comprobarSiExisteEmail():bool
    {
       
       $consultEmail = $this->consultEmail();
       
         if($this->consultEmail()){  
                return true;
            }else {
                return false;
            }  
    }   

    public function consultUser()
    {
        $query = "SELECT * FROM users WHERE user = '$this->user'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    public function consultEmail()
    {
        $query = "SELECT * FROM users WHERE email = '$this->email'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }

 
    }   



?>