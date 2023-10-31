<?php require_once("utilities.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "styles.php"; ?>
    <title>Encuentranos</title>
</head>
<body>
    <?php include 'formulario.php'; ?>
    <div class="last-m">Última actualización: <?php echo getLastModification(__FILE__); ?></div>
    <div id="encuentranos">
        <section class="dir">
            <h2>Visitanos en nuestra empresa, nos encontramos en:</h2>
            <h2>Av LIC.Adolfo López M.Ote 1001, La Huerta, 20250 Aguascalientes, Ags.</h2>
        </section>
        <section class="frame">
            <!-- Iframe de Google Maps -->
            <iframe src="https://www.google.com/maps/embed?pb=!4v1698605254709!6m8!1m7!1smOQAXL1CPhODzex-9nrCLw!2m2!1d21.87841808404093!2d-102.2812184565043!3f130.5483223844508!4f8.439165360038487!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </div>
    <?php require 'footer.php'?>
</body>
</html>
