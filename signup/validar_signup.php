<?php
spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});

 if(isset($_POST['submit'])){
     $name = $_POST['name'] ?? '';
     $lastName =$_POST['lastname'] ?? '';
     $email = $_POST['email'] ?? '';
     $user = $_POST['user'] ?? '';
     $password = $_POST['password'] ?? '';
     $passwordRepeat = $_POST['repeat_password'] ?? '';
     if(empty($user) or empty($password)){
        header('location: index.php?message=Error: el ususario o la clave estan vacias&type=ErrorMessage'); 
     }
 }

 $signup = new Signup(new Conexion);
 $signup->setUser($user);
 $signup->setPassword($password);
 $signup->setName($name);
 $signup->setLastName($lastName);
 $signup->setEmail($email);
   
 if(strcmp($password,$passwordRepeat) === 0){
    if ($signup->comprobarSiExisteUser() == true) {
       header('location: signup.php?message=El usuario ('.$user.') no esta disponible. Intenta con otro usuario diferente.&type=ErrorMessage&name='.$name.'&lastname='.$lastName.'&email='.$email);
   }elseif ($signup->comprobarSiExisteEmail() == true) {
       header('location: signup.php?message=El email ('.$email.') ya esta asociado a una cuenta.&type=ErrorMessage&name='.$name.'&lastname='.$lastName.'&user='.$user);
   }else {
       if($signup->signUp()== true)
       {
           header('location: signup.php?message=Tu cuenta ha sido creado satisfactoriamente.&type=SuccessMessage');
       }else{
           header('location: signup.php?message=Ha ocurrudo un error al crear el usuario.&type=ErrorMessage');
       }
   }

}else{
   header('location: signup.php?message=Las contraseñas no coinciden&type=ErrorMessage&name='.$name.'&lastname='.$lastName.'&email='.$email.'&user='.$user);
}


 ?>
