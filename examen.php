<?php
    require_once("utilities.php");
    verifySession();

    $preguntas = array(
        array(
            "pregunta" => "¿Qué es un lenguaje de programación orientado a objetos?",
            "respuestas" => array(
                "Un lenguaje que solo utiliza objetos",
                "Un lenguaje que permite la programación estructurada",
                "Un lenguaje que organiza el código en objetos",
                "Un lenguaje que no permite la reutilización de código"
            ),
            "QID" => 0
        ),
        array(
            "pregunta" => "¿Qué es una API (Application Programming Interface)?",
            "respuestas" => array(
                "Un formato de archivo de imágenes",
                "Un lenguaje de programación popular",
                "Un conjunto de reglas y protocolos para la comunicación entre software",
                "Un lenguaje de marcado utilizado en páginas web"
            ),
            "QID" => 1
        ),
        array(
            "pregunta" => "¿Cuál de las siguientes no es una ventaja de la programación orientada a objetos?",
            "respuestas" => array(
                "Reutilización de código",
                "Modularidad",
                "Facilidad de depuración",
                "Mayor rendimiento en todas las situaciones"
            ),
            "QID" => 2
        ),
        array(
            "pregunta" => "¿Qué es un sistema de control de versiones?",
            "respuestas" => array(
                "Un software que verifica la calidad del código",
                "Una herramienta para administrar proyectos de desarrollo de software",
                "Un sistema que registra y controla los cambios en el código fuente",
                "Un lenguaje de programación"
            ),
            "QID" => 3
        ),
        array(
            "pregunta" => "¿Cuál de las siguientes no es una metodología ágil de desarrollo de software?",
            "respuestas" => array(
                "Scrum",
                "Waterfall",
                "Kanban",
                "DevOps"
            ),
            "QID" => 4
        ),
        array(
            "pregunta" => "¿Qué es la programación concurrente?",
            "respuestas" => array(
                "Un enfoque para escribir código que se ejecuta en un solo hilo",
                "La capacidad de un sistema para realizar múltiples tareas simultáneamente",
                "Un lenguaje de programación popular",
                "Un patrón de diseño de software"
            ),
            "QID" => 5
        ),
        array(
            "pregunta" => "¿Qué es un patrón de diseño en el desarrollo de software?",
            "respuestas" => array(
                "Una forma de cifrar datos",
                "Una solución general y reutilizable para un problema común en el desarrollo de software",
                "Una metodología de prueba de software",
                "Un sistema de gestión de bases de datos"
            ),
            "QID" => 6
        ),
        array(
            "pregunta" => "¿Qué es la recursión en programación?",
            "respuestas" => array(
                "Un error en el código",
                "Un enfoque para resolver problemas dividiéndolos en subproblemas más pequeños y similares",
                "Un tipo de bucle",
                "Una forma de encapsular datos y comportamiento en un objeto"
            ),
            "QID" => 7
        ),
        array(
            "pregunta" => "¿Cuál de las siguientes no es una ventaja de la virtualización de servidores?",
            "respuestas" => array(
                "Mayor utilización de recursos",
                "Aislamiento de aplicaciones",
                "Mayor consumo de energía",
                "Mayor flexibilidad en la gestión de servidores"
            ),
            "QID" => 8
        ),
        array(
            "pregunta" => "¿Qué es la inyección de dependencias en programación?",
            "respuestas" => array(
                "Un patrón de diseño para la creación de objetos",
                "Un enfoque para evitar errores en el código",
                "Una técnica para pasar las dependencias de un objeto en lugar de crearlas internamente",
                "Una técnica para mejorar la seguridad de la aplicación"
            ),
            "QID" => 9
        )
    );

    shuffle($preguntas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php include "styles.php"; ?>
    <title>Preguntas para Desarrolladores de Software</title>
</head>
<body>
    <?php include "formulario.php"; ?>
    <h1>Preguntas para Desarrolladores de Software</h1>
    <form action="calificar.php" method="post">
        <ol>
            <?php foreach ($preguntas as $index => $pregunta): ?>
                <li>
                    <?php echo "<label>".$pregunta["pregunta"]."</label>"; ?>
                    <ul>
                        <?php
                        shuffle($pregunta["respuestas"]);
                        foreach ($pregunta["respuestas"] as $i => $respuesta) {
                            echo '<li><input type="radio" name="' . $pregunta["QID"] . '" value="' . $respuesta . '" > ' . $respuesta . '</li>';
                        }
                        ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ol>
        <input type="submit" id="botonEnviar" value="Enviar respuestas" disabled>
    </form>
    <script src="js/abilitarBoton.js"></script>
</body>
</html>
