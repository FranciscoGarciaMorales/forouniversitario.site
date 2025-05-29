<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../librerias/phpmailer/PHPMailer.php';
require '../librerias/phpmailer/SMTP.php';
require '../librerias/phpmailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $nombre = strip_tags(trim($_POST['nombre']));
    $mensaje = strip_tags(trim($_POST['mensaje']));

    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 0; // Muestra información detallada del envio
    $mail->Debugoutput = 'html'; // Formato amigable
    try {
        // Configuración del servidor SMTP de Hostinger
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contacto@forouniversitario.site'; 
        $mail->Password = '74217151Ytg.';               
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;

        // Configurar emisor y destinatario
        $mail->setFrom('contacto@forouniversitario.site', 'Foro Universitario');
        $mail->addAddress('contacto@forouniversitario.site'); 

        // Contenido del mensaje
        $mail->isHTML(false);
        $mail->Subject = 'Nuevo mensaje desde el formulario de contacto';
        $mail->Body    = "Nombre: $nombre\nEmail: $email\n\nMensaje:\n$mensaje";

        $mail->send();
        echo "ok";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    http_response_code(405);
    echo "Método no permitido";
}