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
     if(empty($user) or empty($password) or empty($email) or empty($passwordRepeat) or empty($lastName) or empty($name)){
        header('location: ../register/?message=Error:All camps are needes.&type=ErrorMessage'); 
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
       header('location: ../register/?message=This username ('.$user.') not available. Try another different username.&type=ErrorMessage&name='.$name.'&lastname='.$lastName.'&email='.$email);
   }elseif ($signup->comprobarSiExisteEmail() == true) {
       header('location: ../register/?message=This email ('.$email.') is already associated with another account.&type=ErrorMessage&name='.$name.'&lastname='.$lastName.'&user='.$user);
   }else {
       if($signup->signUp()== true)
       {
           header('location: ../login/?message=Your account has been successfully created.&type=SuccessMessage');
       }else{
           header('location: ../register/?message=An error occurred while creating the user. Try again later.&type=ErrorMessage');
       }
   }

}else{
   header('location: ../register/?message=Passwords do not match.&type=ErrorMessage&name='.$name.'&lastname='.$lastName.'&email='.$email.'&user='.$user);
}


 ?>
