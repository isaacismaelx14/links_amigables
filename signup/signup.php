<?php
$year = date("Y");
$createdYear = 2003;
$lastYear = $year - $createdYear;
$line = $createdYear."-".$year;
$host= $_SERVER["HTTP_HOST"];    
$Css =  '"http://' . $host .'/links_amigables/resource/css/bootstrap.min.css"'; 
$CssSignup = '"http://' . $host .'/links_amigables/resource/css/signup/signup_styles.css"'; 
$js = '"http://' . $host .'/links_amigables/resource/js/signup/form-validation.js"'; 
$jsValidata = '"http://' . $host .'/links_amigables/resource/js/signup/validata.js"'; 
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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signup</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href=<?= $Css?> rel="stylesheet">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href=<?= $CssSignup?> rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2>Signup</h2>
    <?=$message_out?>  
  </div>

  <div class="row">
    <form class="needs-validation" action="validar_signup.php" method="post"  >
    <div class="row">
          <div class="col-md-6 mb-3 form-group">
            <label for="firstName" >First name</label>
            <input type="text" name="name" class="form-control" id="firstName" placeholder="John" value=<?php echo('"'.$name.'"'); ?>onkeypress="return soloLetras2(event)" required>
            <div class="alertNamer">
            </div>
          </div>
          <div class="col-md-6 mb-3 form-group form-check">
            <label for="lastName">Last name</label>
            <input type="text" name="lastname" class="form-control" id="lastName" placeholder="Newton" value=<?php echo('"'.$lastname.'"'); ?> onkeypress="return soloLetras2(event)" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="user" name="user" class="form-control" id="username" placeholder="Username" value=<?php echo('"'.$user.'"') ?> onkeypress="return soloLetras(event)" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted"></span></label>
          <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value=<?php echo('"'.$email.'"'); ?> onkeypress="return soloLetras3(event)" required>
          <div class="invalid-feedback">
            Please enter a valid e-mail address.
          </div>
        </div>

        <div class="mb-3">
          <label for="password">password</label>
          <input type="password" name="password" class="form-control" id="password" required>
          <div class="invalid-feedback">
            Please enter a password
          </div>
        </div>

        <div class="mb-3">
          <label for="password">confirm password</label>
          <input type="password" class="form-control" id="repeat_password" name="repeat_password" autocomplete="false" required>
          <div class="invalid-feedback">
            Please confirm the password
          </div>
        </div> 
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" action="signup.php">Continue to signup</button>
        <span class="mb-3">*I already have an account and I want <a href="../login/">login</a></spanp>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">

    <p class="mb-1">&copy; <?= $line?> Isaac_Code <?=$lastYear?></p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src=<?=$js?>></script>
        <script src=<?=$jsValidata?>></script>
    </body>
</html>