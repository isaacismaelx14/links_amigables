<?php 

class Mail
{
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../phpmailer/Exception.php';
    require '../../phpmailer/PHPMailer.php';
    require '../../phpmailer/SMTP.php';
    $mail = new PHPMailer(true);

    /**
     * Funcion para enviar correos.
     * @param string $tipe Designa el nombre que aparecera al envar el correo. Ejemplo: "SmartTime Team"
     * @param string $subject Desiga cual es el motivo de por el cual se envia el correo. Ejemplo: "Password Recovery"
     * @param string $body Es el mensaje que se decea enviar.
     * @param string $email Es el correo del destinatario.
     * @param string $name Nombre del destinatario
     * @param string $lastName Apellido del destinatario
     * @param string $action Es la accion que se realizara al enviar el correo> header($action)
     */
    public function SendMail($tipe, $subject,$body,$email,$name,$lastName,$action)
    {
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
            $mail->setFrom('smarttimeteam@gmail.com', $tipe);
            $mail->addAddress($email, $name.' '.$lastName);     // Add a recipient
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
        
            $mail->send();
        
            header($action);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
