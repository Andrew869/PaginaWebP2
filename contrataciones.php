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
    <div class="containerC">
        <h1>Vacantes de Trabajo</h1>
    <div id="carouselExampleCaptions" class="carousel slide">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/back-end.jpg" alt="Image 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Desarrollador Back-end</h5>
                <p>El Desarrollador Back-end es responsable de crear y mantener la lógica del servidor y la base de datos en aplicaciones web. Debe ser experto en lenguajes como PHP, Python, Ruby, Java, o C#.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/front-end.jpg" alt="Image 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Desarrollador Front-end</h5>
                <p>El Desarrollador Front-end se enfoca en la parte visual de las aplicaciones web. Debe ser experto en HTML, CSS, JavaScript y frameworks como React, Angular o Vue.js.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/Prog-intern.jpg" alt="Image 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Programador Interino</h5>
                <p>El Programador Interino es un profesional temporal que se encarga de cubrir ausencias de otros programadores. Debe ser versátil y capaz de trabajar en varios proyectos.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/Exp-UI.jpg" alt="Image 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Diseñador de Interfaz</h5>
                <p>El Diseñador de Interfaz se encarga de crear interfaces de usuario atractivas y funcionales para aplicaciones web. Debe ser experto en diseño gráfico y herramientas de diseño.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/seguridad.jpg" alt="Image 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Ingeniero en Seguridad</h5>
                <p>El Ingeniero en Seguridad se enfoca en proteger sistemas y datos de amenazas cibernéticas. Debe tener un profundo conocimiento en seguridad informática.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/jefe-de-proyecto.jpg" alt="Image 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Gerente de Proyectos Web</h5>
                <p>El Gerente de Proyectos Web lidera y supervisa proyectos de desarrollo web. Debe ser un experto en gestión de proyectos y comunicación con el equipo.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/CEOS1.jpg" alt="Image 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Especialista en CEO</h5>
                <p>El Especialista en CEO se encarga de optimizar la visibilidad de un sitio web en los motores de búsqueda. Debe ser un experto en SEO (Optimización de Motores de Búsqueda).</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/analista.jpg" alt="Image 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Analista de Datos</h5>
                <p>El Analista de Datos recopila y analiza información para tomar decisiones basadas en datos. Debe ser competente en el manejo de datos y herramientas de análisis.</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <div class="dynamic">
        <?php
            $_SESSION["examPasswd"] = $currentUserData[4];
            $_SESSION["attempts"] = $currentUserData[5];

            // echo "<h1>Bienvenido(a) ".$_SESSION["firstName"].'!</h1>';
            // echo "<h2>Tu codigo es: ".$_SESSION["examPasswd"]."</h2>";
            // echo "<h2>Intentos restantes para hacer el examen: ".$_SESSION["attempts"]."</h2>";

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
        <?php if(strlen($_SESSION["examPasswd"]) !== 8) echo '<div class="alert alert-primary" role="alert">Para poder hacer el examane primero debes hacer el siguiente formulario</div>'; ?>
        <!-- <h2>Para poder hacer el examane primero debes hacer el siguiente formulario</h2> -->
        <div class="divf"><a class="formulario" href="<?php echo (strlen($_SESSION["examPasswd"]) !== 8) ? "solicitud_empleo.php" : "generate_pdf.php"; ?>"><?php echo (strlen($_SESSION["examPasswd"]) !== 8) ? "llenar Formulario" : "ver PDF"; ?></a></div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <input type="text" name="examPasswd" id="" placeholder="clave generada" required>
            <input type="submit" value="realizar examen">
        </form>
    </div>
    </div>
    <?php require 'footer.php' ?>
</body>
</html>