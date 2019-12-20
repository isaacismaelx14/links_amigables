<?php
spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});

 
     $name = $_POST['name'] ?? '';
     $lastName =$_POST['lastname'] ?? '';
     $email = $_POST['email'] ?? '';
     $user = $_POST['user'] ?? '';
     $password = $_POST['password'] ?? '';
     $passwordRepeat = $_POST['repeat_password'] ?? '';
     if(empty($user) or empty($password) or empty($email) or empty($passwordRepeat) or empty($lastName) or empty($name)){
        echo('Error:All camps are needes.'.''.$user.' '.$lastName.' '.$email.' '.$password.' '.$user.' '.$passwordRepeat); 
     }
   
 $signup = new Signup(new Conexion);
 $signup->setUser($user);
 $signup->setPassword($password);
 $signup->setName($name);
 $signup->setLastName($lastName);
 $signup->setEmail($email);


if(strcmp($password,$passwordRepeat) != 0 || $signup->comprobarSiExisteUser() == true ||  $signup->comprobarSiExisteEmail() == true ){
   
    if ($signup->comprobarSiExisteUser() == true) {
        echo('<div class="alert alert-warning alert-dismissible fade show" role="alert">
        This username ('.$user.') not available. Try another different username
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
           </div>');
    }

    if ($signup->comprobarSiExisteEmail() == true) {
        echo('<div class="alert alert-warning alert-dismissible fade show" role="alert">
        This email ('.$email.') is already associated with another account.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
               </div>
  ');
    }

    if (strcmp($password,$passwordRepeat) != 0) {
        echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Passwords do not match.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
       </div>
       ');
    }
}else{
    if($signup->signUp()== true)
    {
        echo ('Ok!');
    }else{
        echo('<div class="alert-danger" role="alert">
        An error occurred while creating the user. Try again later
       </div>');
    }
}


 ?>