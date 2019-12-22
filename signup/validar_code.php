<?php 
spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});
     $code = $_POST['code'] ?? '';
     $id = $_POST['id'] ?? '';

     if(empty($code)){
        echo('Error:All camps are needes'); 
     }
     $con = new Conexion;  
     $tabla = 'user_verify';
     $where = 'user_id';
     $select = new Select($con);   
     if($select->comprobarValue($tabla,$where,$id) != false){
         $code_database = $select->comprobarValue($tabla,$where,$id)['code_user'];
         if($code_database === $code){
             $update = new Update($con);
             if($update->updateValueR('users','email_verify','1','id',$id)){
                echo('1');
            }
         }else{
            echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Tu codigo no es correcto
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
           </div>
           ');
         }
        
     }else{
        echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Lo sentimos ha ocurrido un error, intento mas tarde.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
       </div>
       ');
     }
