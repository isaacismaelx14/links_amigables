<?php
class Select
{
    private $con;
    public $id;
    public $email;
   



    public function __construct(Conexion $con)
    {
        $this->con = $con;
    }
    public function setId(String $id)
    {
        $this->id = $this->con->real_escape_string($id);
    }
    public function setEmail(String $email)
    {
        $this->email = $this->con->real_escape_string($email);
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

    public function checkIsEmail()
    {
       $updated = $this->selectEmail();
       
        if($this->selectEmail()){
            return $updated;      
        }else{
            return false;  
        }    
        
    }   
    /**
     * Esta funcio se encargar de introducir la inormacion recibida en la base de datos.
     * Recibe tres parametros:
     * @param string $table El nombre de la tabla en la cual se quiere hacer la consulta en nuestra base de datos 'SELECT * FROM table_name'
     * @param string $where Recibe el nombre de la columna en la que se quiere realizar la consulta Ejemplo: "WHERE '$colum_id'"
     *  @param string $value Es para indicar cual es el valor que queremos consustar en la base de datos. Ejm: "WHERE colum_id = '$value'" 
     *  @return bool Si el valor existe en la base de datos retornara un "true" de lo contrario un "false" o si hubo algun error a la hora de
     * realizar la consulta.   
     */
    public function comprobarSiExiste($table, $where, $value):bool
    {          
         if($this->consult($table, $where, $value)){  
                return true;
            }else {
                return false;
            }  
    }   
    public function comprobarValue($table, $where, $value)
    { 
        $value = $this->consult($table, $where, $value);
        if($value){  
               return $value;
           }else {
               return false;
               echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Lo sentimos ha ocurrido un error, intento mas tarde.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
              </div>
              ');
           }  
    }   
    public function consult($table, $where, $value)
    {
        $query = "SELECT * FROM $table WHERE $where = '$value'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function selectId()
    {
        $query = "SELECT * FROM users WHERE id = '$this->id'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    
    public function selectEmail()
    {
        $query = "SELECT * FROM users WHERE email = '$this->email'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }
}