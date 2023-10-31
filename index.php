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
    
	<div class="contenedor">
		<div class="header"><p>Innovatio est via ad successum.</p>
                        <p>La innovación es el camino hacia el éxito</p>
    </div>
		<div class="sidebar-1" style="
		
		background-image: url('img/fondoo.gif'); /* Ruta de la imagen */
		background-size: cover; /* Ajusta la imagen para cubrir todo el contenedor */
		background-position: center; /* Ajusta el tamaño del fondo para cubrir toda la ventana del navegador */
		background-repeat: no-repeat; /* Centra la imagen en el contenedor */
		border: 2px solid #333; /* Borde sólido de 2 píxeles con color #333 */
		border-radius: 10px; /* Borde redondeado */
	"></div>
		<div class="footer"><img id="2" src="img/6.jpg" style="background-size: cover;"></div>
	</div>
    
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
            <img src="img/logo2.png">
        </div>
    </div>
    <div id="prin">
        <h1>"Construyendo Innovación a través del Código: VirtuCreatix, Tu Socio Tecnológico."</h1>
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
        <section>
            <h2>Testimonios</h2>
            <div class="testimonio">
                <p><strong>Nombre: María Pérez</strong></p>
                <p><strong>Cargo: Desarrolladora Senior</strong></p>
                <p><strong>Testimonio:</strong> "Trabajar con VirtuCreatix ha sido una experiencia excepcional. Desde el primer día, he sentido un ambiente de trabajo colaborativo y un enfoque constante en la calidad del software que producimos. La formación y el apoyo que recibimos aquí son incomparables, lo que nos permite estar al tanto de las últimas tendencias tecnológicas. Estoy orgullosa de ser parte de un equipo que se esfuerza por superar las expectativas de nuestros clientes."</p>
            </div>
            <div class="testimonio">
                <p><strong>Nombre: Javier Torres</strong></p>
                <p><strong>Cargo: Ingeniero de Calidad</strong></p>
                <p><strong>Testimonio:</strong> "Como ingeniero de calidad, he tenido la oportunidad de trabajar en proyectos desafiantes junto a VirtuCreatix, que han mejorado constantemente mis habilidades y la de mis colaboradores. Nuestro compromiso con la calidad es innegable, y siempre estamos buscando formas de optimizar nuestros procesos de desarrollo. Estoy convencido de que nuestro enfoque en la excelencia y la satisfacción del cliente nos distingue en la industria."</p>
            </div>
            <div class="testimonio">
                <p><strong>Nombre: Carlos Gómez</strong></p>
                <p><strong>Cargo: Gerente de Proyectos</strong></p>
                <p><strong>Testimonio:</strong> "Desde que me colabore con VirtuCreatix como gerente de proyectos, he sido testigo de un compromiso inquebrantable con la eficiencia y la innovación. La cultura de colaboración y el enfoque en la mejora continua son evidentes en cada proyecto que emprendemos. Aquí, la calidad es una prioridad, y trabajamos incansablemente para entregar soluciones de software que cumplan y superen las expectativas de nuestros clientes."</p>
            </div>
        </section>
        <h2>Garantía de Calidad</h2>
        <p>En VirtuCreatix, estamos comprometidos con la excelencia y la satisfacción del cliente en cada proyecto que emprendemos. Nuestra Garantía de Calidad se basa en los siguientes pilares:</p>
        <ul>
            <li>Desarrollo Riguroso: Nuestro equipo de desarrolladores sigue prácticas y estándares de programación de vanguardia, asegurando que el software que entregamos sea robusto, seguro y eficiente.</li>
            <li>Pruebas Rigurosas: Antes de cualquier entrega, sometemos nuestros productos a pruebas exhaustivas para identificar y resolver posibles problemas. Esto incluye pruebas de funcionalidad, pruebas de rendimiento y pruebas de seguridad.</li>
            <li>Mantenimiento Continuo: No consideramos que nuestro trabajo haya terminado con la entrega del software. Ofrecemos un soporte post-implementación constante para abordar cualquier problema que pueda surgir y garantizar un rendimiento óptimo.</li>
            <li>Comunicación Transparente: Mantenemos una comunicación abierta y constante con nuestros clientes. Estamos dispuestos a escuchar sus comentarios y realizar ajustes según sea necesario para satisfacer sus necesidades y expectativas.</li>
            <li>Compromiso con la Innovación: Estamos dedicados a mantenernos actualizados con las últimas tendencias tecnológicas y metodologías de desarrollo. Siempre estamos buscando formas de mejorar nuestros procesos y ofrecer soluciones de software innovadoras.</li>
        </ul>
    </div>
    <?php require 'footer.php' ?>
</body>
</html>