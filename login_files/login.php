<?php $message = $_GET['message'] ?? ''; ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <?php require("resource/request/head.php");?>
    <title>Login</title>
    <link rel="stylesheet" href=<?=$cssLogin?> >
</head>

<body class="text-center">

    <form class="form-signin"  action="../validar/" method="post">
      <h1 class="tittle" ><?= $app_name ?></h1>

      <?= $message ?>  

      <h1 class="h3 mb-3 font-weight-normal">Please login</h1>
      <label for="inputEmail" class="sr-only">User</label>    
      <input type="text" id="inputEmail" name="user" class="form-control" placeholder="user" required autofocus>
     
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
     
      <button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">Login</button>
      <p>*I do no have account I want to <a href="../signup/">signup</a></p> 
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>

<?php require("resource/request/footer.php");?>    
</body>
</html>