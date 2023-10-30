<?php
    require_once('TCPDF-6.6.5/tcpdf.php');
    require_once('utilities.php');
    verifySession();

    if(strlen($_SESSION["examPasswd"]) !== 8) {
        $examPasswd = generateExamPasswd(8);
        $_SESSION["examPasswd"] = $examPasswd;
        editFile($_SESSION["email"], 4, $examPasswd);
    }
    else {
        $examPasswd = $_SESSION["examPasswd"];
        editFile($_SESSION["email"], 4, $examPasswd);
    }

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->AddPage();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_SESSION["firstName"];
        $apellidos = $_SESSION['lastName'];
        $telefono = $_POST['telefono'];
        $lenguajes = isset($_POST['lenguajes']) ? $_POST['lenguajes'] : array();
        $viajar = isset($_POST['viajar']) ? $_POST['viajar'] : "";
        $cambiarse_domicilio = isset($_POST['cambiarse_domicilio']) ? $_POST['cambiarse_domicilio'] : "";
        $ingles = isset($_POST['ingles']) ? $_POST['ingles'] : "";
        $puesto = $_POST['puesto'];

        // Agregar el logo de tu empresa al principio del documento
        $logo_path = 'img/CodeCrafters.jpg';
        $pdf->Image($logo_path, 10, 10, 50 , '', "JPG");
        
        if ($archivo["error"] == UPLOAD_ERR_OK && isset($_FILES["foto"])) {
            $archivo = $_FILES["foto"];
            // Verificar si el archivo es una imagen (puedes implementar una validación más sólida)
            $tipoPermitido = ["image/jpeg", "image/png", "image/gif"];
            if (in_array($archivo["type"], $tipoPermitido)) {
                $nombreTemp = $archivo["tmp_name"];
                $nombreDestino = "img/" . $archivo["name"]; // Directorio donde guardar la foto

                move_uploaded_file($nombreTemp, $nombreDestino);
                $logo_x = 10;
                $logo_y = 10;
                $logo_x_final = $logo_x + $logo_width + 10;
                $tipo = "";
                switch ($tipoPermitido) {
                    case 'image/jpeg':
                        $tipo = "JPG";
                        break;
                    case 'image/png':
                        $tipo = "PNG";
                        break;
                    case 'image/gif':
                        $tipo = "GIF";
                        break;
                    default:
                        $tipo = "";
                        break;
                }
    
                $pdf->Image($nombreDestino, 130, 10, 50, '', $tipo);
            }
        }

        $pdf->SetFont('helvetica', '', 12);
        for ($i=0; $i < 5; $i++) { 
            $pdf->Cell(0, 10, '', 0, 1, 'C');
        }
        $pdf->Cell(0, 10, 'CodeCrafters', 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 10);
        $redaccion = "En este acto, certificamos que $nombre $apellidos ha completado satisfactoriamente su registro para solicitar su examen de ingreso para el puesto $puesto.";
        $pdf->MultiCell(0, 10, $redaccion, 0, 'C');

        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 10, 'Nombre: ' . $nombre, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Apellidos: ' . $apellidos, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Teléfono: ' . $telefono, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Lenguajes de Programación: ' . implode(', ', $lenguajes), 0, 1, 'C');
        $pdf->Cell(0, 10, 'Disponibilidad para Viajar: ' . $viajar, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Disponibilidad para Cambiarse de Domicilio: ' . $cambiarse_domicilio, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Manejo del Idioma Inglés: ' . $ingles, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Puesto al que Aplica: ' . $puesto, 0, 1, 'C');
        $pdf->Cell(0, 10, 'Directora General Luisa Rodríguez González', 0, 1, 'C');
        $firma_path = 'img/sign.png'; 
        $firma_width = 50; // Ancho de la firma
        // $pdf->Image($firma_path, 80, 100, 50, '', 'PNG');
        $pdf->Image($firma_path, 75, $pdf->GetY() + 10, $firma_width, '', "PNG");
        
        $pdf->Cell(0, 10, 'clave generada: '.$examPasswd, 0, 1, 'C');
        $pdfOutput = $pdf->Output($_SESSION["email"].".pdf", 'S');
        $pdfPath = "pdf/".$_SESSION["email"].".pdf";
        file_put_contents($pdfPath, $pdfOutput);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "styles.php"; ?>
    <title>Document</title>
</head>
<body>
    <?php require "formulario.php"; ?>
    <iframe src="<?php echo "pdf/".$_SESSION["email"].".pdf" ?>" width="500" height="600" frameborder="0"></iframe>
</body>
</html>