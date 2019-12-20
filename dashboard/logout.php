<?php 
 spl_autoload_register(function ($class) {
     include '../class/'. $class. '/' . $class . '.class.php';
 });

    $session = new Session();
    $session->destroSession();
    header('location: ../login');
?>
 <html> <script>location.reload();</script> </html>