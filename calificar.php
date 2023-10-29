<?php
    require_once("utilities.php");
    session_start();

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

    $userData = getUserData($_SESSION["email"]);
    $attempts = $userData[3];
    if($attempts > 0)$attempts--;

    editFile($_SESSION["email"], 3, $attempts);

    // $archivo = "cuentas.txt"; // Reemplaza con la ruta de tu archivo
    // $usuario_a_modificar = $_SESSION["email"]; // El nickname del usuario que deseas modificar

    // //$nuevo_password = "nuevo_password"; // Nuevo valor para el password
    // //$nueva_clave = "nueva_clave"; // Nuevo valor para la clave
    // $nuevo_flag = "1"; // Nuevo valor para el flag

    // // Abre el archivo en modo lectura y escritura
    // $archivo_handler = fopen($archivo, "r+");

    // if ($archivo_handler) {
    //     while (($linea = fgets($archivo_handler)) !== false) {
    //         // Divide la línea en sus partes
    //         $datos = explode(" ", $linea);

    //         // Verifica si el nickname coincide
    //         if (trim($datos[0]) === $usuario_a_modificar) {
    //             // Modifica los datos necesarios
    //             // $datos[1] = $nuevo_password;
    //             // $datos[2] = $nueva_clave;
    //             $datos[3] = $nuevo_flag;

    //             // Reconstruye la línea modificada
    //             $linea_modificada = implode(" ", $datos);

    //             // Retrocede al inicio de la línea original
    //             fseek($archivo_handler, -strlen($linea), SEEK_CUR);

    //             // Escribe la línea modificada
    //             fwrite($archivo_handler, $linea_modificada);
    //         }
    //     }

    //     // Cierra el archivo
    //     fclose($archivo_handler);
    // } else {
    //     echo "No se pudo abrir el archivo.";
    // }


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
    <a href="secreta.php">regresar</a>
</body>
</html>