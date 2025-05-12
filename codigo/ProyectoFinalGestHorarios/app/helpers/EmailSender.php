<?php
require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'mtp.gmail.com'; 
$mail->SMTPAuth = true;
$mail->Username = 'gestihorarios@gmail.com'; 
$mail->Password = 'obot wtuw mvjz ixar'; 
$mail->SMTPSecure = 'tls';
$mail->Port = 587; 
$mail->setFrom('gestihorarios@gmail.com', 'GestiHorarios');
$mail->addAddress('mllanten@unimayor.edu.co', 'Miguel Llanten');

$mail->Subject = 'Notificación de cambio en el horario';
$mail->Body = 'Estimado(a) docente

                Se ha creado un nuevo horario en el período académico {}.

                Atentamente,

                 Oficina Sistemas de Información.
                 Institución Universitaria Colegio Mayor del Cauca

                Por favor no responda este mensaje.
                        ';

if (!$mail->send()) {
    echo 'Error al enviar el correo electrónico: '. $mail->ErrorInfo;
} else {
    echo 'Correo electrónico enviado con éxito';
}