<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
$config = require '../../config.php'; 

$mail = new PHPMailer(true);

try {
    echo 'Usando configuraciones del archivo config.php...<br>';

    // Configuración del servidor
    $mail->isSMTP();
    $mail->Host = $config['SMTP_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $config['SMTP_USERNAME'];
    $mail->Password = $config['SMTP_PASSWORD'];
    $mail->SMTPSecure = $config['SMTP_SECURE'];
    $mail->Port = $config['SMTP_PORT'];

    // Destinatarios
    $mail->setFrom($config['SMTP_USERNAME'], 'Mail Manager PescaitosDonCarlos');
    $mail->addAddress($config['SUPPORT_EMAIL']); // Correo del equipo de soporte

    // Obtener datos del formulario
    $userEmail = $_POST['email'];
    $userMessage = $_POST['message'];

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje de contacto';
    $mail->Body = 'Email del cliente: ' . $userEmail . '<br><br>' . $userMessage;

    $mail->send();
    echo 'Mensaje enviado';
} catch (Exception $e) {
    echo "Error al enviar mensaje: {$mail->ErrorInfo}";
}


?>
