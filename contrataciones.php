<?php
    require_once("utilities.php");
    ob_start();

    if (empty($_SESSION["email"])) {
        # Lo redireccionamos al formulario de inicio de sesión
        header("Location: index.php");
    }
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
    <div>
        <?php
            $_SESSION["examPasswd"] = $currentUserData[4];
            $_SESSION["attempts"] = $currentUserData[5];

            echo "<h1>Bienvenido(a) ".$_SESSION["firstName"].'!</h1>';
            echo "<h2>tu codigo es: ".$_SESSION["examPasswd"]."</h2>";
            echo "<h2>te quedan : ".$_SESSION["attempts"]." intentos</h2>";

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
        <a href="generate_pdf.php" target=”_blank” id="generador"><?php echo (strlen($_SESSION["examPasswd"]) !== 8) ? "Generar clave (PDF)" : "ver PDF"; ?></a>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <input type="text" name="examPasswd" id="" placeholder="clave generada" required>
            <input type="submit" value="realizar examen">
        </form>
        <a href="logout.php">Cerrar sesión</a>
    </div>
    <script>
        document.getElementById("generador").addEventListener("click", function(event) {
            // Evita que el enlace abra la nueva página
            // event.preventDefault();
            setTimeout(function() {
                console.log("Pausa de 500 milisegundos");
                location.reload();
            }, 500);
        });
    </script>
</body>
</html>