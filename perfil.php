<?php
    require_once("utilities.php");
    if(!empty($_POST)) {
        foreach($_POST as $index => $datum) {
            // echo $datum;
            editFile($_SESSION["email"], $index, $datum);
        }
        $currentUserData = getUserData($_SESSION["email"]);
        $_SESSION["firstName"] = $currentUserData[0];
        $_SESSION["lastName"] = $currentUserData[1];
        $_SESSION["email"] = $currentUserData[2];
    }
?>
<!DOCTYPE html
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "styles.php"; ?>
    <title>Perfil</title>
</head>
<body>
    <?php include "formulario.php";
        $dataName = array("Nombre(s)", "Apellidos", "Correo", "Contraseña");
        for ($i=0; $i < 4; $i++) { 
    ?>
    <div>
        <span><?php echo $dataName[$i].": " ?></span>
        <span><?php echo ($i == 3)? "••••••••" : $currentUserData[$i] ?></span>
        <a href="#" id="<?php echo "datum_".$i ?>" data-toggle="modal" data-target="#updateInfo">Actualizar dato</a>
    </div>
    <?php
        }
    ?>
    <div id="updateInfo" class="modal fade" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="updateTile"></h3>
                    <button type="button" id="fadeButton" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <div class="modal-body">
                        <input type="text" style="display:none">
                        <input type="password" style="display:none">
                        <!-- ^ preventing autocomplete on firefox ^ -->
                        <p><input type="text" id="updateDatum" name="indexDatum" placeholder="nuevo dato" autocomplete="off" required> </p>
                    </div>
                    <div class="modal-footer">                
                        <div class="form-group">                  
                            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/updateForm.js"></script>
</body>
</html>