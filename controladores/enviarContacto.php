<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $nombre = trim($_POST['nombre']);
    $mensaje = trim($_POST['mensaje']);

    if ($email === '' || $nombre === '' || $mensaje === '') {
        die("Por favor, completa todos los campos.");
    }

    $to = "contacto@forouniversitario.site";
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $nombre\nEmail: $email\nMensaje:\n$mensaje";
    $headers = "From: $email\r\nReply-To: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "✅ Mensaje enviado con éxito.";
    } else {
        echo "❌ Error al enviar el mensaje.";
    }
} else {
    header("Location: contacto.php");
    exit();
}
