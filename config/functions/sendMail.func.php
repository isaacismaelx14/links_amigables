<?
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
 */
public function SendMail($tipe, $subject,$body,$email,$name,$lastName):bool
{
   
}