<?php 

class Session  
{
    public function __construct()
    {
        session_start();
    }   

    public function addValue($key,$value){
        $_SESSION[$key] = $value;
    }

    public function getValue($key)
    {
        if($this->isserValue($key))
           return $_SESSION[$key];
        return false;
    }

    public function removeValue($key)
    {
      if($this->isserValue($key)){}
          unset($_SESSION[$key]);
    }

    public function isserValue($value)
    {
        return isset($_SESSION[$value]) ? true:false;   
    }

    public function destroSession()
    {
        session_unset();
        session_destroy();  
    }
}


?>