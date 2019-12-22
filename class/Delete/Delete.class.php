<?php
class Delete
{
    private $con;
    public $id;
    public $email;
   



    public function __construct(Conexion $con)
    {
        $this->con = $con;
    }
  
    /**
     * Esta funcio se encargar de eliminar informacion en la base de datos.
     * Recibe tres parametros:
     * @param string $table El nombre de la tabla en la cual se quiere hacer la consulta en nuestra base de datos 'D * FROM table_name'
     * @param string $where Recibe el nombre de la columna en la que se quiere realizar la consulta Ejemplo: "WHERE '$colum_id'"
     *  @param string $value Es para indicar cual es el valor que queremos consustar en la base de datos. Ejm: "WHERE colum_id = '$value'" 
     *  @return bool Si el valor existe en la base de datos retornara un "true" de lo contrario un "false" o si hubo algun error a la hora de
     * realizar la consulta.   
     */
    public function DeleteValue($table, $where, $value):bool
    {          
         if($this->consult($table, $where, $value)){  
                return true;
            }else {
                return false;
            }  
    }  
    public function consult($table, $where, $value)
    {
        $query = "DELETE FROM $table WHERE $where = '$value'";
        $result = $this->con->query($query);   
        return $result->fetch_array(MYSQLI_ASSOC);
    }
}