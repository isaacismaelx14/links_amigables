<?php 
//$message = $_GET['message'] ?? ''; 
spl_autoload_register(function ($class) {
  include '../class/Message/' . $class . '.class.php';
});
  

include '../class/Session/Session.class.php';
$session = new Session();
if($session->validateSession('id')){
  header('location: ../dashboard');
}
 

$message = isset($_GET['message']) && isset($_GET['type']) ? MessageFactory::
  CreateMessage($_GET['type']) : false;

$message_out = $message ? $message->getMessage($_GET['message']) : '';

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

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href=<?= $JsFont?> rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href=<?= $CssDashboard?> rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row --> <br> <br>
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" action="validar_login.php" method="post">
                   
                   <?php echo $message_out; ?>  
                    <label for="inputEmail" class="sr-only">User or Email</label>    
                    <input type="text" id="inputEmail" name="user" class="form-control form-control-user" placeholder="user or email" required autofocus>
     
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control form-control-user" placeholder="Password" required>
                    </br>
                    <button class="btn btn-primary btn-user btn-block" name='submit' type="submit">Login</button>
                    <hr>
                    <div class="text-center">
                    <a class="small" href="../forgot-password">Forgot Password?</a>
                   </div>
                   <div class="text-center">
                    <a class="small" href="../register/">Create an Account!</a>
                  </div>
                </div>
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


</body>

</html>


