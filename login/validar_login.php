 <?php
spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});

 if(isset($_POST['submit'])){
     $user = $_POST['user'] ?? '';
     $password = $_POST['password'] ?? '';
     if(empty($user) or empty($password)){
        header('location: index.php?message=Error: el ususario o la clave estan vacias'); 
     }
 }

 $login = new Login(new Conexion);
 $login->setUser($user);
 $login->setPassword($password);
   
if($login->signIn())
{
     echo 'credenciales validas';
}else{
    header('location: index.php?message=El usuario, email o contraseña introducidos no son validos.');
}

 ?>
