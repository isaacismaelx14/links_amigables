<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';
$mail = new PHPMailer(true);


$rest = $_GET['restore'] ?? 'NO';
$message = $_GET['message'] ?? '';
$id = $_GET['id'] ?? '';
$host= $_SERVER["HTTP_HOST"];    



include ('../config/functions/sendMail.func.php');

spl_autoload_register(function ($class) {
    include '../class/'. $class. '/' . $class . '.class.php';
});

 if(isset($_POST['submit'])){
     $email = $_POST['email'] ?? '';
     $idPost = $_POST['id'] ?? '';
     if(empty($email)){
        header('location: index.php?message=Error: el ususario o la clave estan vacias&type=ErrorMessage'); 
     }
 }

 $con = new Conexion();
 
    $restore = new RestorePassword($con);
    $restore->setEmail($email);
    $row =  $restore->consultIfExist(); 
    $id = $restore->consultIfExist()['id'];
    $name = $restore->consultIfExist()['name'];
    $lastName = $restore->consultIfExist()['lastname'];
   
   if($row)
   {
       
    include('../config/functions/time.func.php');
    //--------------------------------------------------------
        $opc_letras = TRUE; //  FALSE para quitar las letras
    $opc_numeros = TRUE; // FALSE para quitar los números
    $opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
    $opc_especiales = FALSE; // FALSE para quitar los caracteres especiales
    $longitud = 29;
    $password = "";
    
    $letras ="abcdefghijklmnopqrstuvwxyz";
    $numeros = "1234567890";
    $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $especiales ="|@#~$%()=^*+[]{}-_";
    $listado = "";
    
    if ($opc_letras == TRUE) {
        $listado .= $letras; }
    if ($opc_numeros == TRUE) {
        $listado .= $numeros; }
    if($opc_letrasMayus == TRUE) {
        $listado .= $letrasMayus; }
    if($opc_especiales == TRUE) {
        $listado .= $especiales; }
    
    str_shuffle($listado);
    for( $i=1; $i<=$longitud; $i++) {
    $password[$i] = $listado[rand(0,strlen($listado))];
    str_shuffle($listado);
    }

    $codigoUnico = $password;
  
    $con = new Conexion();
    $update =new Update($con); 
    $update->setId($id);
    $update->setValue('1');
    $update->setColum('password_modify');
   
     
    $updateTime =new Update($con); 
    $updateTime->setId($id);
    $updateTime->setValue($time);
    $updateTime->setColum('time_limit_pm');
   
    $updateCode =new Update($con); 
    $updateCode->setId($id);
    $updateCode->setValue($codigoUnico);
    $updateCode->setColum('code_pm');
    
       if ($update->checkIsUpdate() & $updateTime->checkIsUpdate() & $updateCode->checkIsUpdate()) {
          
         // header('location: ../forgot-password/?action=modify&id='.$id.'&emp='.$codigoUnico);
         $body='<strong> <h1>Password recovery</h1>
            <h2> Hi '.$name.'</h2>
             you have requested a password recovery. If so, here is your link to retrieve 
            it. if you do not request it, ignore this message</strong> <br> 
            Click this link: <a href="http://'. $host .'/links_amigables/forgot-password/?action=modify&id='.$id.'&emp='.$codigoUnico.'">recover password</a>';

         
         try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'smarttimeteam@gmail.com';                     // SMTP username
            $mail->Password   = 'club789456123';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('smarttimeteam@gmail.com', 'SmartTime Team Password Recovery');
            $mail->addAddress($email, $name.' '.$lastName);     // Add a recipient
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Password Recovey';
            $mail->Body = $body;
        
            $mail->send();
        
            header('location: ../forgot-password/?action=acepted&email='.$email);
        } catch (Exception $e) {
            return false;
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
 
       }else{
        header('location:  ../forgot-password/?message=Ha ocurrido un error de servidor&type=ErrorMessage');
       }
       
       }else{
       header('location:  ../forgot-password/?message=The email entered is not associated with any account&type=ErrorMessage');
       
   }



?>