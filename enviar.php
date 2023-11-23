<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // mandamos llamar a las librerias de phpmailer
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    //Se crea una instancia de la clase PHPMailer; le pasamos el valor de `true` para habilitar exceptions
    $mail = new PHPMailer(true);
    try{
        $emailTo=$_POST["correo"];
        $subject=$_POST["asunto"];
        $bodyEmail=$_POST["mensaje"];

        //Ajustes del Servidor para el acceso de envio de correo
        $mail->SMTPDebug = 0;                       
        $mail->isSMTP();                                            
        $mail->Host       = 'mail.subitus.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = '';                     
        $mail->Password   = '';                               
        $mail->SMTPSecure = 'tls'; 
        $mail->Port       = 587;        

        // Destinatarios del correo(remitente y receptor(dauphin.swim@gmail.com electromagnetico1ntegrado@gmail.com m1guel.sant1ag0@ciencias.unam.mx)) 
        $mail->setFrom('', 'Nombre');
        $mail->addAddress($emailTo);

        //Contenido del mensaje
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $bodyEmail;

        $mail->send();
        echo 'El mensaje se envío correctamente';
    }catch(Exception $e){
        echo "Error al enviar mensaje: {$mail->ErrorInfo}";
    }
?>