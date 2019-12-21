<?php
class Insert
{
    private $con;
    public $id;
    public $code;


    public function __construct(Conexion $con)
    {
        $this->con = $con;
    }

    public function setId(String $id)
    {
        $this->id = $id;
    }

    public function setCode(String $code)
    {
        $this->code = $code;
    }

   
    public function InsertValue():bool
    {
        $sql = "INSERT INTO `user_verify`(`user_id`, `code_user`) VALUES ('$this->id','$this->code')";
        if ($this->con->query($sql) === true) {
           return true;
           echo('funciona');
        }else{
            echo('error en la validacin'.' '.$this->id.' '.$this->code. ' ');
           return false;
        }
        
    }


    }   



?>
