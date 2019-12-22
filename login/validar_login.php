 <?php
spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});


     $user = $_POST['user'] ?? '';
     $password = $_POST['password'] ?? '';
     if(empty($user) or empty($password)){
     //   header('location: index.php?message=Error: el ususario o la clave estan vacias&type=ErrorMessage'); 
     }
 

 $login = new Login(new Conexion);
 $login->setUser($user);
 $login->setPassword($password);
 $row =  $login->signIn();  
if($row)
{
    if($row['id'] === '1'){
         $session = new Session();
        $session->addValue('id', $row['id']);
       #header('location: ../dashboard');
        echo('acepted');
    }else{
        echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            El email no esta verificado
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
       </div>
       ');
    }
    
    }else{
  #  header('location: ../login/?message=The username/email or password entered are not valid.&type=ErrorMessage');
    echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    EL usuario es incorrecto
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    ');
}

 ?>
