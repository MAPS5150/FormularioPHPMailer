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
        $mail->setFrom('', '');
        $mail->addAddress($emailTo);

        //Contenido del mensaje
        $mail->isHTML(true);
        $mail->Subject = $subject;
        // agregamos una imagen al contenido del correo
        $contenido_email = '
            <body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif;>
                <div>
                    <a href="https://ibb.co/tcD9hwq">
                        <img src="https://i.ibb.co/Mp7mhyc/felizguanajuato.jpg" alt="felizguanajuato" border="10" width="30%" height="30%">
                    </a>
                </div>
                <h3>Bienvenido 👋, se te ha asignado un nuevo reporte.</h3>
            </body>
        ';
        // se envia el email con la imagen de arriba
        $mail->Body = $bodyEmail.$contenido_email;

        $mail->send();
        echo 'El mensaje se envío correctamente';
    }catch(Exception $e){
        echo "Error al enviar mensaje: {$mail->ErrorInfo}";
    }
?>