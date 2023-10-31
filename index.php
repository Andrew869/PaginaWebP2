<?php
    require_once("utilities.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "styles.php"; ?>
    <title>Pagina principal</title>
</head>
<body>
    <?php include "formulario.php"; ?>
    <div class="last-m">Última actualización: <?php echo getLastModification(__FILE__); ?></div>
    <?php
        if (!empty($_SESSION["email"])) {
            $hora = date("H");
            if ($hora >= 5 && $hora < 12) {
                $saludo = "¡Buenos días";
            } elseif ($hora >= 12 && $hora < 18) {
                $saludo = "¡Buenas tardes";
            } else {
                $saludo = "¡Buenas noches";
            }
            echo "<div class='top'><h1>".$saludo.' '.$_SESSION["firstName"]."!</h1>";
        }
    ?>
        <div style="text-align: center;">
            <img src="img/logo2.png" style="width: 300px; height: 300px; display: inline-block;">
        </div>
    </div>
    <div id="prin">
        <h1>"Construyendo Innovación a través del Código: VirtuCratix, Tu Socio Tecnológico."</h1>
        <section>
            <h2>¿Quiénes somos?</h2>
            <img src="img/somos.jpg" style="width: 500px; height: 300px;">
            <p>Somos una empresa especializada en el desarrollo de software con una sólida trayectoria en la industria. Nuestra empresa fue fundada en [año de fundación] y desde entonces hemos estado comprometidos con la excelencia en el desarrollo de software. Nuestra misión es brindar soluciones tecnológicas innovadoras que impulsen el éxito de nuestros clientes.</p>
                <li>Historia: Hemos estado operando en la industria del software durante más de [número de años] años. Durante este tiempo, hemos trabajado en una amplia variedad de proyectos, desde aplicaciones móviles hasta sistemas empresariales complejos.</li>
                <li>Valores: En nuestra empresa, valoramos la calidad, la innovación, la colaboración y la satisfacción del cliente. Estos valores fundamentales guían todas nuestras operaciones y decisiones.</li>
                <li>Equipo: Contamos con un equipo de desarrolladores altamente calificados y apasionados por la tecnología. Nuestros expertos en software tienen una amplia experiencia en diversas tecnologías y están comprometidos con mantenerse actualizados en las últimas tendencias de la industria.</li>
        </section>
        <section>
            <h2>¿Cómo trabajamos?</h2>
            <img src="img/trabajo.png" style="width: 500px; height: 300px;">
            <p>Nuestra metodología de trabajo se basa en un enfoque colaborativo y orientado a resultados.</p>
                <li>Colaboración cercana: Trabajamos estrechamente con nuestros clientes para comprender sus necesidades y objetivos. Creemos en la comunicación abierta y transparente en todas las etapas del proyecto.</li>
                <li>Desarrollo ágil: Seguimos un enfoque ágil en el desarrollo de software, lo que nos permite adaptarnos a cambios rápidamente y entregar productos de alta calidad de manera más eficiente.</li>
                <li>Calidad y pruebas: La calidad es una prioridad para nosotros. Realizamos rigurosas pruebas de software para garantizar que cada producto que entregamos cumpla con los estándares más altos de calidad.</li>
                <li>Mantenimiento y soporte: No terminamos nuestra relación con los clientes después de la entrega del proyecto. Ofrecemos servicios de mantenimiento y soporte continuo para garantizar que nuestros productos sigan siendo efectivos a lo largo del tiempo.</li>
        </section>
    </div>
    <?php require 'footer.php' ?>
</body>
</html>