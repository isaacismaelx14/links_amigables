<?php 
$rest = $_GET['restore'] ?? 'NO';
$message = $_GET['message'] ?? '';
$id = $_GET['id'] ?? '';
$host= $_SERVER["HTTP_HOST"];    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';



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
    include('../config/functions/generateCode.func.php');
  
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

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.zoho.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'smarttime@zohomail.com';                     // SMTP username
    $mail->Password   = 'jLVfQgzK1mJN';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('smarttime@zohomail.com', 'SmartTime Team');
    $mail->addAddress($email, $name.' '.$lastName);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password recovery';
    $mail->Body    = 'Hi '.$name.', you have requested a password recovery. If so, here is your link to retrieve 
    it. if you do not request it, ignore this message <br>  este es su link: 
         <a href="http://'. $host .'/links_amigables/forgot-password/?action=modify&id='.$id.'&emp='.$codigoUnico.'">recover password</a>';

    $mail->send();

    header('location: ../forgot-password/?action=acepted&email='.$email);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

      
   
       }else{
        header('location:  ../forgot-password/?message=Ha ocurrido un error de servidor&type=ErrorMessage');
       }
       
       }else{
       header('location:  ../forgot-password/?message=The email entered is not associated with any account&type=ErrorMessage');
       
   }



?>