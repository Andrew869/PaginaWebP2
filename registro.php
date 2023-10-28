<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $email = $_POST["email"];
        $passwd = $_POST["passwd"];
        if(empty($email) || empty($passwd)) {
            echo "<h1>datos vacios!<h1>";
        }
        else {
            $file = fopen("cuentas.txt", 'a');
            
            if($file) {
                fwrite($file, $email." ".$passwd."\r\n");
                
                fclose($file);
                echo "<h1>registro completo!<h1>";
            }
            else {
                echo "<h1>no se pudo registrar ocurrio un error :(<h1>";
            }
        }
    ?>
    <a href="formulario.php">regresar</a>
</body>
</html>
