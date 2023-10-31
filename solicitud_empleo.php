<?php require_once("utilities.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "styles.php"; ?>
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include "formulario.php"; ?>
    <div id="solicitud-empleo">
            <h2>Llena la solicitud de empleo si quieres postularte a un puesto de trabajo</h2>
            <div class="out-inputs">
                <label for="firstName">Nombre:</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo $_SESSION["firstName"] ?>" disabled required><br>
                
                <label for="lastName">Apellidos:</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo $_SESSION["lastName"] ?>" disabled required><br>
            </div>
            <form method="post" action="generate_pdf.php" enctype="multipart/form-data">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" required><br>

                <label for="fecha">Fecha de nacimiento:</label>
                <select name="fecha_dia" required>
                    <option value="">Día</option>
                    <?php
                        for ($dia = 1; $dia <= 31; $dia++) {
                            echo "<option value='$dia'>$dia</option>";
                        }
                    ?>
                </select>
                <select name="fecha_mes" required>
                    <option value="">Mes</option>
                    <?php
                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        for ($mes = 1; $mes <= 12; $mes++) {
                            echo "<option value='$mes'>".$meses[$mes-1]."</option>";
                        }
                    ?>
                </select>
                <select name="fecha_ano" required>
                    <option value="">Año</option>
                    <?php
                        for ($i = 2023; $i >= 1920; $i--) {
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>
                </select>
                <br>
                <label for="lenguajes">Lenguajes de programación que domina:</label><br>
                <input type="checkbox" name="lenguajes[]" value="PHP"> - PHP.
                <input type="checkbox" name="lenguajes[]" value="Java"> - Java.<br>
                <input type="checkbox" name="lenguajes[]" value="Cmasmas"> - C++.
                <input type="checkbox" name="lenguajes[]" value="HTML"> - HTML.<br>
                <input type="checkbox" name="lenguajes[]" value="Cobol"> - Cobol.
                <input type="checkbox" name="lenguajes[]" value="Python"> - Python.<br>
                <input type="checkbox" name="lenguajes[]" value="Ruby"> - Ruby.
                <input type="checkbox" name="lenguajes[]" value="Cshart"> -C#.<br>

                <label>Disponibilidad de viajar:</label><br>
                <input type="radio" name="viajar" value="si"> Sí
                <input type="radio" name="viajar" value="no"> No<br>

                <label>Disponibilidad de cambiar de domicilio:</label><br>
                <input type="radio" name="cambio_domicilio" value="si"> Sí
                <input type="radio" name="cambio_domicilio" value="no"> No<br>

                <label for="ingles">¿Habla inglés?</label><br>
                <input type="radio" name="ingles" value="si"> Sí
                <input type="radio" name="ingles" value="no"> No<br>

                <label for="puesto">Puesto al que aplica:</label>
                <select name="puesto" required>
                    <option value="">Seleccione un puesto</option>
                    <option value="Desarrollador Back-end">Desarrollador Back-end</option>
                    <option value="Desarrollador Front-end">Desarrollador Front-end</option>
                    <option value="Programador Interino">Programador Interino</option>
                    <option value="Diseñador de Interfaz">Diseñador de Interfaz</option>
                    <option value="Ingeniero en Seguridad">Ingeniero en Seguridad</option>
                    <option value="Gerente de Proyectos Web">Gerente de Proyectos Web</option>
                    <option value="Especialista en CEO">Especialista en CEO</option>
                    <option value="Analista de Datos">Analista de Datos</option>
                </select><br>

                <!-- Campo para subir una foto de un rostro -->
                <label for="foto">Subir una foto de un rostro:</label>
                <input type="file" name="foto" accept="image/*" required><br>
                
                <input type="submit" id="miFormulario" value="Finalizar"></input>
            </form>
        </div>
    <?php include "footer.php" ?>
</body>
</html>