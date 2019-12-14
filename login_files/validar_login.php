 <?php
 if(isset($_POST['submit'])){
     $user = $_POST['user'] ?? '';
     $password = $_POST['password'] ?? '';
     if(empty($user) or empty($password)){
        
     }else{
        header('location: ../login/message=Usuario o contraseña no introducidos'); 
     }
 }

 ?>
