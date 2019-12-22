<?php
spl_autoload_register(function ($class) {
    include '../class/Message/' . $class . '.class.php';
  });

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

include"../class/Conexion/Conexion.class.php";
include"../class/Select/Select.class.php";
include"../class/Insert/Insert.class.php";
include'../config/functions/codeVerify.func.php';

//Obtener un mensage de error
    
$message = isset($_GET['message']) && isset($_GET['type']) ? MessageFactory::
CreateMessage($_GET['type']) : false;
$message_out = $message ? $message->getMessage($_GET['message']) : '';

  

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
    $name = $select->checkIsEmail()['name'];
    $tabla = 'user_verify';                                       //Tabla Name
    $where = 'user_id';                                           //Column Name
    $comp = new Select($con);  
    if($comp->comprobarSiExiste('users','email_verify','1') != false){
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
      header("location: ../login/?message=the user is already verify&type=ErrorMessage");
    }

    }else{
      header("location: ../login/?message=the link isn't correct. Try again&type=ErrorMessage");
    }
   
}else{
    header("location: ../login/?message=the link isn't correct. Try again&type=ErrorMessage");
}

//--------------end verify email-------------------------------
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href=<?= $JsFont?> rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  <!-- Custom styles for this template-->
  <link href=<?= $CssDashboard?> rel="stylesheet">



</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Verify your Email!</h1>
                <?=$message_out?>  
                
                    <style>
                    .respuesta #respuesta{
                    color: red;
                    }
                    </style>
                <div class="respuesta"></div>
                <div id="respuesta"></div>
              </div>
              <form class="user" autocomplete="off" id="form" name="form">
                <div class="form-group">
                <input type="text" name="code" class="form-control form-control-user" id="code"minlength="7" maxlength="7" placeholder="Enter your code..." onkeypress="return soloLetras(event)" required>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" id="enviar" action="signup.php" >Verify code</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src=<?= $jsjquery?> ></script>
  <script src=<?= $jsBootstrap?> ></script>

  <!-- Core plugin JavaScript-->
  <script src=<?= $jsjqueryII?> ></script>

  <!-- Custom scripts for all pages-->
  <script src=<?= $jsAdmin?> ></script>

  <script>

function soloLetras(e){
     key = e.keyCode || e.which;
     teclado = String.fromCharCode(key).toLowerCase();
     letras="-1234567890";
     especiales ="8-37-38-95";
     teclado_especial = false;

        $palabra = document.form.code.value;
        if($palabra.length == 3){
            console.log("add -");
            document.form.code.value += '-';
        }

     for(var i in especiales){
         if(key==especiales[i]){
             teclado_especial = true;
             console.log('especales');
             break;
         }


         if(letras.indexOf(teclado)==-1 && !teclado_especial){
            return false;
         }
     }
 }

 console.log('AJAX Script executed successfuly');
  $("form").bind("submit", function (){
    
    console.log('Enviado');
      var code = document.getElementById('code').value;
      var id = "<?=$id?>";

      var ruta = "code="+code+"&id="+id;
      $.ajax({
        url:'../signup/validar_code.php',
        type:'POST',
        data: ruta,
        })
        .done(function(res){  
            if(res === "1"){
                document.location.href='../login/?message=Your email has been successfully verify. Welcome <?=$name?>, now you can login.&type=SuccessMessage';
                console.log('Acepted');
             }else{
                console.log('Error In Validation');
                 $('#respuesta').html(res);
              }
        })
        .fail(function(){
            console.log("error");
        });
        return false;
  });
</script>
 
</body>

</html>
