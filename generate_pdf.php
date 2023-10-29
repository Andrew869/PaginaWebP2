<?php
    require_once('TCPDF-6.6.5/tcpdf.php');
    require_once('utilities.php');

    session_start();

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->AddPage();
    
    if(strlen($_SESSION["examPasswd"]) !== 8) {
        $examPasswd = generateExamPasswd(8);
        $_SESSION["examPasswd"] = $examPasswd;
        editFile($_SESSION["email"], 2, $examPasswd);
    }
    else {
        $examPasswd = $_SESSION["examPasswd"];
        editFile($_SESSION["email"], 2, $examPasswd);
    }
    
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'clave generada: '.$examPasswd, 0, 1, 'C');

    $pdf->Output('ejemplo.pdf', 'I');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $nombre = $_POST["nombre"];
        // $apellidos = $_POST["apellidos"];
        // $curso = $_POST["curso"];
        // $horas = $_POST["horas"];
        // $fecha = $_POST["fecha"];
        // $profesor = $_POST["profesor"];

        // $pdf->Image('images/logo.jpg', 80, 10, 50, '', 'JPG');
        // $pdf->Image('images/sign.png', 80, 100, 50, '', 'PNG');

        $pdf->SetFont('helvetica', '', 12);
        for ($i=0; $i < 5; $i++) { 
            $pdf->Cell(0, 10, '', 0, 1, 'C');
        }
        $pdf->Cell(0, 10, 'Escuela Primaria "Luz de Saber"', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Directora Luisa Rodríguez González', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 10);
        $redaccion = "En este acto, certificamos que $nombre $apellidos ha completado satisfactoriamente el curso de $curso, con una duración de $horas. El curso concluyó el $fecha y fue impartido por el profesor $profesor. El desempeño de $nombre $apellidos Estudiante durante el curso ha sido ejemplar, y le otorgamos esta constancia en reconocimiento a sus logros.";
        $pdf->MultiCell(0, 10, $redaccion, 0, 'L');

        // $pdf->Cell(0, 10, $nombre, 0, 1);
        // $pdf->Cell(0, 10, $apellidos, 0, 1);
        // $pdf->Cell(0, 10, $curso, 0, 1);
        // $pdf->Cell(0, 10, $horas, 0, 1);
        // $pdf->Cell(0, 10, $fecha, 0, 1);
        // $pdf->Cell(0, 10, $profesor, 0, 1);
        $pdf->Output('ejemplo.pdf', 'I'); // 'I' para mostrar en el navegador, 'F' para guardar en un archivo

        // if(!empty($flag)) {
        //     echo "<div class='right'><pre>Inicio de sesion correcto!</pre></div>";
        // }
        // else {
        //     echo "<div class='wrong'><pre>Datos Incorrectos! :c</pre></div>";
        // }
    }
?>
