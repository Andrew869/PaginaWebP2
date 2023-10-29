<?php
    require_once("utilities.php");

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