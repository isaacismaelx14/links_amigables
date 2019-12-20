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
     $session->addValue('id', $row['id']);
     header('location: ../dashboard');
    }else{
    header('location: ../login/?message=The username/email or password entered are not valid.&type=ErrorMessage');
}

 ?>
