<?php
    require_once("utilities.php");
    ob_start();
    session_start();

    if (empty($_SESSION["email"])) {
        # Lo redireccionamos al formulario de inicio de sesión
        header("Location: formulario.php");
    }
    else {

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'formulario.php'; ?>
    <div style="margin:100px;">
        <?php
            $userData = getUserData($_SESSION["email"]);
            $_SESSION["examPasswd"] = $userData[2];
            $_SESSION["attempts"] = $userData[3];

            echo "<h1>Bienvenido(a) ". $_SESSION["email"] .'!</h1>';
            echo "<h2>tu codigo es: ".$userData[2]."</h2>";
            echo "<h2>te quedan : ".$userData[3]." intentos</h2>";

            $clave = $_POST["clave"];
            if(!empty($clave)) {
                $file = fopen("cuentas.txt", "r");
                $flag = 0; //para saber si la cuenta y contrasena estan en el archivo
                while (!feof($file)) {
                    $linea = fgets($file);
                    if ($linea != "") {
                        $aux = preg_split("/[\s]+/", $linea);   /*https://www.w3schools.com/php/func_regex_preg_split.asp
                                                        https://www.w3schools.com/php/php_ref_regex.asp*/
                        $email = $aux[0];
                        $claveGenerada = $aux[2];
                        $attempts = $aux[3];
                        // echo $claveGenerada;
                        if ($email === $_SESSION["email"] && $claveGenerada === $clave && $attempts > 0) {
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
            <input type="text" name="clave" id="" placeholder="clave generada" required>
            <input type="submit" value="realizar examen">
        </form>
        <a href="logout.php">Cerrar sesión</a>
    </div>
    <script>
document.getElementById("generador").addEventListener("click", function(event) {
    // Evita que el enlace abra la nueva página
    // event.preventDefault();
    sleep(10);
    // Recarga la página actual
    location.reload();
});
</script>
</body>
</html>