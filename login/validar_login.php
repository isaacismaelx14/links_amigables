 <?php
spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});

 if(isset($_POST['submit'])){
     $user = $_POST['user'] ?? '';
     $password = $_POST['password'] ?? '';
     if(empty($user) or empty($password)){
        header('location: index.php?message=Error: el ususario o la clave estan vacias&type=ErrorMessage'); 
     }
 }

 $login = new Login(new Conexion);
 $login->setUser($user);
 $login->setPassword($password);
 $row =  $login->signIn();  
if($row)
{
     echo 'credenciales validas';
     $session = new Session();
     $session->addValue('email', $row['email']);
     echo $session->getValue('email');
}else{
    header('location: login.php?message=El usuario, email o contraseña introducidos no son validos.&type=ErrorMessage');
}

 ?>
