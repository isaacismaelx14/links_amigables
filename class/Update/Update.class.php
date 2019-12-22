<?php
class Update
{
    private $con;
    public $id;
    public $value;
    public $colum;

    public function __construct(Conexion $con)
    {
        $this->con = $con;
    }

    public function setId(String $id)
    {
        $this->id = $this->con->real_escape_string($id);
    }
    public function setValue(String $value)
    {
        $this->value = $this->con->real_escape_string($value);
    }
    public function setColum(String $colum)
    {
        $this->colum = $this->con->real_escape_string($colum);
    }


    public function checkIsUpdate()
    {
       $updated = $this->updateValue();
       
        if($this->updateValue()){
            return $updated;      
        }else{
            return false;  
        }    
        
    }   
    public function updateValue():bool
    {
        $sql = "UPDATE users SET $this->colum = '$this->value' WHERE id = '$this->id'";
        if ($this->con->query($sql) === true) {
            return true;
         }else{
            return false;
         }
    }
/**
 * Actualiza un valor de la tabla.
 */
    public function updateValueR($table, $colum, $value, $where, $valueWhere):bool
    {
        $sql = "UPDATE $table SET $colum = '$value' WHERE $where = '$valueWhere'";
        if ($this->con->query($sql) === true) {
            return true;
         }else{
            return false;
         }
    }
}