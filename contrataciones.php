<?php
    require_once("utilities.php");
    ob_start();

    verifySession();

    // echo $_POST[""]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "styles.php" ; ?>
    <title>pagina contrataciones</title>
</head>
<body>
    <?php require "formulario.php"; ?>
    <div class="last-m">Última actualización: <?php echo getLastModification(__FILE__); ?></div>
    <div id="vacan">
        <h1>Vacantes de Trabajo</h1>
        <select id="vacantes" onchange="mostrarInformacion()">
            <option value="Selecciona una vacante">Vacantes</option>
            <option value="Desarrollador Back-end">Desarrollador Back-end</option>
            <option value="Desarrollador Front-end">Desarrollador Front-end</option>
            <option value="Programador Interino">Programador Interino</option>
            <option value="Diseñador de Interfaz">Diseñador de Interfaz</option>
            <option value="Ingeniero en Seguridad">Ingeniero en Seguridad</option>
            <option value="Gerente de Proyectos Web">Gerente de Proyectos Web</option>
            <option value="Especialista en CEO">Especialista en CEO</option>
            <option value="Analista de Datos">Analista de Datos</option>
        </select>
        <div id="informacion">
            <div class="vacante">
                <img id="imagen-vacante" src="img/Marco.png" alt="">
                <div>
                    <h2 id="titulo-vacante">Presiona en nuestras opciones de vacantes</h2>
                    <p id="explicacion-vacante">Y te mostraremos una breve descripcion de lo que buscamos</p>
                </div>
            </div>
        </div>
        <script>
            function mostrarInformacion() {
                var seleccion = document.getElementById("vacantes").value;
                var tituloVacante = "";
                var explicacionVacante = "";
                var imagenSrc = "";
                
                switch (seleccion) {
                    case "Desarrollador Back-end":
                        tituloVacante = "Desarrollador Back-end";
                        explicacionVacante = "El Desarrollador Back-end es responsable de crear y mantener la lógica del servidor y la base de datos en aplicaciones web. Debe ser experto en lenguajes como PHP, Python, Ruby, Java, o C#.";
                        imagenSrc = "img/back-end.jpg";
                        break;
                    case "Desarrollador Front-end":
                        tituloVacante = "Desarrollador Front-end";
                        explicacionVacante = "El Desarrollador Front-end se enfoca en la parte visual de las aplicaciones web. Debe ser experto en HTML, CSS, JavaScript y frameworks como React, Angular o Vue.js.";
                        imagenSrc = "img/front-end.jpg";
                        break;
                        case "Programador Interino":
                        tituloVacante = "Programador Interino";
                        explicacionVacante = "El Programador Interino es un profesional temporal que se encarga de cubrir ausencias de otros programadores. Debe ser versátil y capaz de trabajar en varios proyectos.";
                        imagenSrc = "img/Prog-intern.jpg";
                        break;
                    case "Diseñador de Interfaz":
                        tituloVacante ="Diseñador de Interfaz"
                        explicacionVacante = "El Diseñador de Interfaz se encarga de crear interfaces de usuario atractivas y funcionales para aplicaciones web. Debe ser experto en diseño gráfico y herramientas de diseño.";
                        imagenSrc = "img/Exp-UI.jpg";
                        break;
                    case "Ingeniero en Seguridad":
                        tituloVacante = "Ingeniero en Seguridad";
                        explicacionVacante = "El Ingeniero en Seguridad se enfoca en proteger sistemas y datos de amenazas cibernéticas. Debe tener un profundo conocimiento en seguridad informática.";
                        imagenSrc = "img/seguridad.jpg";
                        break;
                    case "Gerente de Proyectos Web":
                        tituloVacante = "Gerente de Proyectos Web";
                        explicacionVacante = "El Gerente de Proyectos Web lidera y supervisa proyectos de desarrollo web. Debe ser un experto en gestión de proyectos y comunicación con el equipo.";
                        imagenSrc = "img/jefe-de-proyecto.jpg";
                        break;
                    case "Especialista en CEO":
                        tituloVacante = "Especialista en CEO";
                        explicacionVacante = "El Especialista en CEO se encarga de optimizar la visibilidad de un sitio web en los motores de búsqueda. Debe ser un experto en SEO (Optimización de Motores de Búsqueda).";
                        imagenSrc = "img/CEOS1.jpg";
                        break;
                    case "Analista de Datos":
                        tituloVacante = "Analista de Datos";
                        explicacionVacante = "El Analista de Datos recopila y analiza información para tomar decisiones basadas en datos. Debe ser competente en el manejo de datos y herramientas de análisis.";
                        imagenSrc = "img/analista.jpg";
                        break;
                    default:
                        explicacionVacante = "Selecciona una vacante para ver más información.";
                        imagenSrc = "img/Marco.png";
                }
                
                document.getElementById("titulo-vacante").textContent = tituloVacante;
                document.getElementById("explicacion-vacante").textContent = explicacionVacante;
                document.getElementById("imagen-vacante").src = imagenSrc;
            }
        </script>
    </div>
    <div>
        <?php
            $_SESSION["examPasswd"] = $currentUserData[4];
            $_SESSION["attempts"] = $currentUserData[5];

            echo "<h1>Bienvenido(a) ".$_SESSION["firstName"].'!</h1>';
            echo "<h2>Tu codigo es: ".$_SESSION["examPasswd"]."</h2>";
            echo "<h2>Intentos restantes para hacer el examen: ".$_SESSION["attempts"]."</h2>";

            $examPasswd = $_POST["examPasswd"];
            if(!empty($examPasswd)) {
                $file = fopen("cuentas.txt", "r");
                $flag = 0; //para saber si la cuenta y contrasena estan en el archivo
                while (!feof($file)) {
                    $linea = fgets($file);
                    if ($linea != "") {
                        $aux = preg_split("/[:]+/", $linea);   /*https://www.w3schools.com/php/func_regex_preg_split.asp
                                                        https://www.w3schools.com/php/php_ref_regex.asp*/
                        $email = $aux[2];
                        $claveGenerada = $aux[4];
                        $attempts = $aux[5];
                        // echo $claveGenerada;
                        if ($email === $_SESSION["email"] && $claveGenerada === $examPasswd && $attempts > 0) {
                            $flag = 1;
                            break;
                        }
                    }
                }
                fclose($file);
                if($flag) {
                    echo "true";
                    header("location:examen.php");
                }
            }
        ?>
        <p>Para continuar debes hacer el siguiente formulario</p>
        <a href="<?php echo (strlen($_SESSION["examPasswd"]) !== 8) ? "solicitud_empleo.php" : "generate_pdf.php"; ?>"><?php echo (strlen($_SESSION["examPasswd"]) !== 8) ? "llenar Formulario" : "ver PDF"; ?></a>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <input type="text" name="examPasswd" id="" placeholder="clave generada" required>
            <input type="submit" value="realizar examen">
        </form>
    </div>
    <?php require 'footer.php' ?>
</body>
</html>