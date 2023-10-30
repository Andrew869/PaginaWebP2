<?php
    require_once("utilities.php");

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];
    if(!empty($email) || !empty($passwd)) {
        $userData = getUserData($email);

        if(empty($userData[2])){
            $file = fopen("cuentas.txt", 'a');
            
            if($file) {
                fwrite($file, $firstName.':'.$lastName.':'.$email.':'.$passwd.":0:1\n");
                fclose($file);
                session_start();
                $_SESSION["firstName"] = $firstName;
                $_SESSION["lastName"] = $lastName;
                $_SESSION["email"] = $email;

                // echo $_SESSION["firstName"];
            }
        }
    }
    header("Location: index.php");
?>