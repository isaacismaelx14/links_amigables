<?php 
spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});
     $code = $_POST['code'] ?? '';
     $id = $_POST['id'] ?? '';

     if(empty($code)){
        echo('Error:All camps are needes'); 
     }/*
     $con = new Conexion;  
     $tabla = 'user_verify';
     $where = 'user_id';
     $select = new Select($con);   
     if($select->comprobarSiExiste($tabla,$where,$id) != true){*/
echo($code.' '. $id);