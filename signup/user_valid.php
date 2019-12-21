<?php
//------------------------Start Links---------------------------------------------

$host= $_SERVER["HTTP_HOST"];    
$Css =  '"http://' . $host .'/links_amigables/resource/css/bootstrap.min.css"'; 
$CssDashboard =  '"http://' . $host .'/links_amigables/dashboard/css/sb-admin-2.css"'; 
$JsFont =  '"http://' . $host .'/links_amigables/dashboard/vendor/fontawesome-free/css/all.min.css"'; 
$jsBootstrap =  '"http://' . $host .'/links_amigables/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"'; 
$jsjquery =  '"http://' . $host .'/links_amigables/dashboard/vendor/jquery/jquery.min.js"'; 
$jsjqueryII =  '"http://' . $host .'/links_amigables/dashboard/vendor/jquery-easing/jquery.easing.min.js"'; 
$jsAdmin =  '"http://' . $host .'/links_amigables/dashboard/js/sb-admin-2.min.js"'; 
$jsChart =  '"http://' . $host .'/links_amigables/dashboard/vendor/chart.js/Chart.min.js"'; 
$jsDemo =  '"http://' . $host .'/links_amigables/dashboard/js/demo/chart-area-demo.js"'; 
$jsDemoII =  '"http://' . $host .'/links_amigables/dashboard/js/demo/chart-pie-demo.js"'; 

//----------------------End Links------------------------------------

spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});
include'../config/functions/codeVerify.func.php';

//----------------------Start Get Email-------------------------
$email = $_GET['email'] ?? '';
     if(empty($email)){
        echo('Error:All camps are needes.'); 
     }

//-------------------End Get Email------------------------------

//-----------------------Start verify email------------------------------

$con = new Conexion;                                                //get a new conexion
$select = new Select($con);                                         //get de select Script
$select->setEmail($email);
if($select->checkIsEmail()){
    $id = $select->checkIsEmail()['id'];
    $tabla = 'user_verify';                                       //Tabla Name
    $where = 'user_id';                                           //Column Name
    $comp = new Select($con);  
    if($comp->comprobarSiExiste($tabla,$where,$id) != true){
        $insert = new Insert($con);
        $insert->setId($id); 
        $insert->setCode($codigo);
        if($insert->InsertValue()){
            echo($id);
        }else{
            echo('error'. ' '. $id. ' '. $codigo);
        }
    }else{
        echo('ya estaba registrado');
    }

}else{
    echo('tu usuario no esta registrado en la base de datos');
}

//--------------end verify email-------------------------------
?>
