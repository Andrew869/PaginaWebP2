<?php
    require_once("utilities.php");
    setup($_POST["email"]);
    $passwd = $_POST["passwd"];
    
    if ($currentUserData[2] === $currentEmail && $currentUserData[3] === $passwd) {
        $_SESSION["firstName"] = $currentUserData[0];
        $_SESSION["lastName"] = $currentUserData[1];
        $_SESSION["email"] = $currentUserData[2];
    }
    header("Location:index.php");
?>