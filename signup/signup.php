<?php
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
$login = 'http://' . $host .'/links_amigables/login/';

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

  <script type="text/javascript">
window.onload=function(){
	Objeto=document.getElementsByTagName(" ");
	for(a=0;a<Objeto.length;a++){
		Objeto[a].onclick=function(){
			location.replace("<?= $reg?>");
			return false;
		}
	}
}
</script>

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
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                <?=$message_out?>  
                <div id="respuesta"></div>
              </div>
              <form class="user" autocomplete="off" id="form">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" name="name" class="form-control form-control-user" id="firstName" placeholder="Name" onkeypress="return soloLetras2(event)" required>
                  </div>
                  <div class="col-sm-6">
                  <input type="text" name="lastname" class="form-control form-control-user" id="lastName" placeholder="LastName"  required>
                  </div>
                </div>
                <div class="form-group">
                <input type="user" name="user" class="form-control form-control-user" id="username" placeholder="Username"   onkeypress="return soloLetras(event)" required autocomplete="off">
                </div>
                <div class="form-group">
                <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Email"  required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required autocomplete="off">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="repeat_password" name="repeat_password"  placeholder="Confirm Password" required autocomplete="off">
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" id="enviar" action="signup.php" >Register Account</button>
                <hr>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="../forgot-password">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="../login">Already have an account? Login!</a>
              </div>
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

  <script src=<?=$jsValidata?>></script>

  <script>
  
console.log('AJAX Script executed successfuly');
  $("form").bind("submit", function (){
    
    console.log('Enviado');
      var name = document.getElementById('firstName').value;
      var lastname = document.getElementById('lastName').value;
      var user = document.getElementById('username').value;
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      var ConfirmPassword = document.getElementById('repeat_password').value;

      var ruta = "name="+name+"&lastname="+lastname+"&user="+user+"&email="+email+"&password="+password+"&repeat_password="+ConfirmPassword;
      $.ajax({
        url:'../signup/validar_signup.php',
        type:'POST',
        data: ruta,
        })
        .done(function(res){  
            if(res === "1"){
                document.location.href='../user-validate/?message=Your account has been successfully created, but first you have to verify your email.&type=SuccessMessage&email='+email;
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