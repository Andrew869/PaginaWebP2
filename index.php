<?php
    require_once("utilities.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "styles.php"; ?>
    <title>Pagina principal</title>
</head>
<body>
    <?php 
        include "formulario.php";
        
        if (!empty($_SESSION["email"])) {
            $hora = date("H");
            if ($hora >= 5 && $hora < 12) {
                $saludo = "¡Buenos días";
            } elseif ($hora >= 12 && $hora < 18) {
                $saludo = "¡Buenas tardes";
            } else {
                $saludo = "¡Buenas noches";
            }
            echo "<h1>".$saludo.' '.$_SESSION["firstName"]."!</h1>";
        }
    ?>
    <div class="seccion">seccion 1</div>
    <div class="seccion">seccion 2</div>
    <div class="seccion">seccion 3</div>
    <div class="seccion">seccion 4</div>
</body>
</html>