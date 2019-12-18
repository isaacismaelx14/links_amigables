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
 
$codigoUnico = NULL;
$month = date("m");
$hour = date("G") - 5;
$minuts = date("i");
$year = date("Y");
$segundos = date("s");


#$time = $hour.' '.$minuts.' '.$segundos.' '.$month.' '.$year;
$time = $month+$hour+$minuts+$year;

//Obtener un mensage de error
$message = isset($_GET['message']) && isset($_GET['type']) ? MessageFactory::
  CreateMessage($_GET['type']) : false;

$message_out = $message ? $message->getMessage($_GET['message']) : '';

$action = $_GET['action'] ?? '';
$email = $_GET['email'] ?? '';
$code = $_GET['emp'] ?? '';
$id = $_GET['id'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="../dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../dashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<?php if ($action == ''):?>


  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
                  <?= $message_out?>
                  <form class="user" method="post" action="func_restore.php">
                    <div class="form-group">
                      <input type="email"  name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="login.html">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php elseif($action == 'acepted'):?>

    <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-12 col-lg-12 col-md-12">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 d-none d-lg-block text-center"> 
            <div class="col-lg-12"">
              <div class="p-4">
              <h1 class="h4 text-gray-900 mb-2">Check your Email</h1></div>
              <p class="mb-4"><?= $email?></p>
              </div>
            </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>

<?php elseif($action == 'modify'):
  
include '../class/Conexion/Conexion.class.php';
include '../class/Select/Select.class.php';
$select = new Select(new Conexion());
$select->setId($id);
$reason = '.';
#$error =  header('location:  ../forgot-password/?message=Este link ha dejado de funcionar'.$reason.'&type=ErrorMessage');
if($select->checkIsExist()){
  if($select->checkIsExist()['password_modify'] == 1){
    if($select->checkIsExist()['code_pm'] == $code){
      if($select->checkIsExist()['time_limit_pm'] >= $time){
        }else{         
          $reason = ' ya que el mismo ha sobre pasado los 5 minutos limites. Vuelava a intentarlo.';
          header('location:  timeOut.php/?message=We are sorry. This link has stopped working because it has exceeded the 5 minute limit. Try again.&id='.$id);
        }

      }else{
       // header('location: ../login/');
      }
  }else{
    header('location: ../login/');
  }

}else{
 // header('location: ../forgot-password/');
}

  ?>
  <br> <br>
  <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2">Reset your password</h1>
              </div> <br>
              <?= $message_out?>
              <form class="user" method="post" action="change_password.php?id=<?= $id?>&emp=<?=$code?>&tru=none">
                <div class="form-group">
                  <input type="password"  name="password" class="form-control form-control-user" id="password" aria-describedby="password" placeholder="Enter a new password" required>
                 <input type="password"  name="repeat_password" class="form-control form-control-user" id="repeat_password" aria-describedby="confirm password" placeholder="Confirm password" required>
                </div>
                <button type="submit" name="submit2" class="btn btn-primary btn-user btn-block">Reset Password</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="register.html">Create an Account!</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php elseif($action == 'error'):?>


  <div class="container">
<div class="card o-hidden border-0 shadow-lg my-5">
 <div class="row">
 <div class="p-5 text-center">
  <?= $message_out?>
 </div>


 </div>
 </div>

<?php endif;?>

  <!-- Bootstrap core JavaScript-->
  <script src="../dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="../dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../dashboard/js/sb-admin-2.min.js"></script>

</body>

</html>

