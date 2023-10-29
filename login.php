<?php
    require_once("utilities.php");
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];
    
    $userData = getUserData($email);

    // echo $userData[0].' ';
    // echo $userData[1].' ';
    // echo $email.' ';
    // echo $passwd.' ';

    if ($userData[0] === $email && $userData[1] === $passwd) {
        session_start();

        $userData = getUserData($email);

        $_SESSION["email"] = $email;
        // $_SESSION["examPasswd"] = $userData[2];
        // $_SESSION["attempts"] = $userData[3];
        // echo $_SESSION["examPasswd"];
        # Luego redireccionamos a la pagina "Secreta"
        # redireccionamiento con php
        // header("refresh:5; url=secreta.php");
        header("Location:secreta.php");

        # redireccionamiento con javascript   
        //echo '<script>window.location="'.$base_url.'secreta.php"</script>';
        
    } else {
        # No coinciden, asi  que simplemente imprimimos un
        # mensaje diciendo que es incorrecto
         
        
        echo '<div  style="width:50%; margin:100px;" class="alert alert-warning alert-dismissible fade show" role="alert">';
            echo "<p style='text-align:center;'>El email$email o la contrasena son incorrectos</p>";
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo    '<span aria-hidden="true">&times;</span>';
            echo '</button>';
        echo "</div>";
    }
?>