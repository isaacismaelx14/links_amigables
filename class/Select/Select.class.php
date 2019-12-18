<?php
class Select
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

    public function checkIsExist()
    {
       $updated = $this->selectId();
       
        if($this->selectId()){
            return $updated;      
        }else{
            return false;  
        }    
        
    }   
    public function selectId()
    {
        $query = "SELECT * FROM users WHERE id = '$this->id'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }
}