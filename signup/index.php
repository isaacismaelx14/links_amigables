<?php

header('location ../register/');

$year = date("Y");
$createdYear = 2003;
$lastYear = $year - $createdYear;
$line = $createdYear."-".$year;

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
$jsValidata = '"http://' . $host .'/links_amigables/resource/js/signup/validata.js"';
$reg = 'http://' . $host .'/links_amigables/register/';

spl_autoload_register(function ($class) {
    include '../class/Message/' . $class . '.class.php';
  });
//verificar si ya se ha iniciado session
include '../class/Session/Session.class.php';
$session = new Session();
if($session->validateSession('id')){
  header('location: ../dashboard');
}

  $message = isset($_GET['message']) && isset($_GET['type']) ? MessageFactory::
    CreateMessage($_GET['type']) : false;
  
  $message_out = $message ? $message->getMessage($_GET['message']) : '';
  
$name=$_GET['name'] ?? '';
$lastname=$_GET['lastname'] ?? '';
$email=$_GET['email'] ?? '';
$user=$_GET['user'] ?? '';
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

  <div id="container">
  </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src=<?= $jsjquery?> ></script>
  <script src=<?= $jsBootstrap?> ></script>

  <!-- Core plugin JavaScript-->
  <script src=<?= $jsjqueryII?> ></script>

  <!-- Custom scripts for all pages-->
  <script src=<?= $jsAdmin?> ></script>

  <script src=<?=$jsValidata?>></script>

 
<script>



console.log('holasss');
  $('#enviar').click(function(){
    console.log('hola');
      var name = document.getElementById('firstName').value;
      var lastname = document.getElementById('lastname').value;
      var user = document.getElementById('username').value;
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      var ConfirmPassword = document.getElementById('repeat_password').value;

      var ruta = "name="+name+"&lastname="+lastname+"&user="+user+"&email="+email+"&password="+password+"&repeat_password="+ConfirmPassword;
      $.ajax({
        url:'../validar_signup.php',
        type:'POST',
        data: ruta,
        })
        .done(function(res){
            $('#respuesta').html(res);
        })
        .fail(function(){
            console.log("error");
        })
  });

</script>

</body>
</html>

 