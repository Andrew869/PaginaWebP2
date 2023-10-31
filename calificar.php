<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';
    require_once("utilities.php");
    verifySession();
    
    $respuestasCorrectas = array(
        "0" => "Un lenguaje que organiza el código en objetos",
        "1" => "Un conjunto de reglas y protocolos para la comunicación entre software",
        "2" => "Facilidad de depuración",
        "3" => "Un sistema que registra y controla los cambios en el código fuente",
        "4" => "Waterfall",
        "5" => "La capacidad de un sistema para realizar múltiples tareas simultáneamente",
        "6" => "Una solución general y reutilizable para un problema común en el desarrollo de software",
        "7" => "Un enfoque para resolver problemas dividiéndolos en subproblemas más pequeños y similares",
        "8" => "Mayor consumo de energía",
        "9" => "Una técnica para pasar las dependencias de un objeto en lugar de crearlas internamente",
    );

    $attempts = $currentUserData[5];
    if($attempts > 0)$attempts--;

    editFile($_SESSION["email"], 5, $attempts);

    $respuestasUsuario = $_POST;

    $aciertos = 0;

    for ($i=0; $i <= 9; $i++) {
        if($respuestasCorrectas[$i] === $_POST[$i]) {
            $aciertos++;
        }
    }

    $calificacion = $aciertos;
    $aprobado = ($aciertos >= 8);

    $mail = new PHPMailer;
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'andresgh4@gmail.com';
        $mail->Password = 'qmvh bgsd fugl vlcd';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinatario
        $mail->setFrom('email@craft.com', 'VirtuCreatix');
        $mail->addAddress($_SESSION["email"]);  // la dirección de destino

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = ($aprobado ? "¡Felicidades! Ha aprobado el examen" : "Resultado del examen");
        $mail->Body = ($aprobado ?
            "¡Bienvenido a la empresa VirtuCreatix!\n\n" .
            "Estamos emocionados de informarte que has aprobado el examen. Te pedimos que traigas los siguientes documentos para completar tu registro en la empresa:\n" .
            "- CURP\n" .
            "- Acta de nacimiento\n" .
            "- Certificado de preparatoria y secundaria\n\n" .
            "Esperamos verte pronto en nuestras instalaciones. ¡Felicidades de nuevo!"
            :
            "Lamentamos informarte que no has aprobado el examen. No te desanimes, puedes volver a intentarlo dentro de un mes. ¡Sigue practicando!");

        $mail->addAttachment('img/sign.png');

        $mail->send();
        // echo "Tu mensaje ha sido enviado. Atenderemos tu solicitud a la brevedad.";
    } catch (Exception $e) {
        // echo "Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde. Error: {$mail->ErrorInfo}";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de la Evaluación</title>
</head>
<body>
    <h1>Resultados de la Evaluación</h1>
    <p>Total de aciertos: <?php echo $aciertos; ?></p>
    <p>Calificación: <?php echo $calificacion; ?></p>
    <p><?php echo ($aprobado ? 'Aprobado' : 'Reprobado'); ?></p>
    <a href="index.php">regresar</a>
</body>
</html>