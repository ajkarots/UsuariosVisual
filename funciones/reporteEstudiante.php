<?php
require('../fpdf186/fpdf.php');
require('conexion.php');
if(isset($_GET['ced'])){
    $ced= $_GET['ced'];
$sql = 'SELECT * FROM estudiantes WHERE CED_EST=?';
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $ced);
$stmt->execute();
$respuesta= $stmt->get_result();

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetTitle("ESTUIANTE");
$pdf->SetFont('Arial','B',16);
$pdf->Cell(20,10, utf8_decode('Cédula'),     1);
$pdf->Cell(30,10, utf8_decode('Nombre'),     1);
$pdf->Cell(30,10, utf8_decode('Apellido'),   1);
$pdf->Cell(30,10, utf8_decode('Teléfono'),   1);
$pdf->Cell(60,10, utf8_decode('Dirección'),  1);
$pdf->Ln();

if($fila=$respuesta->fetch_array()){
    $pdf->Cell(20,10,utf8_decode($fila['CED_EST']),1);
    $pdf->Cell(30,10,utf8_decode($fila['NOM_EST']),1);
    $pdf->Cell(30,10,utf8_decode($fila['APE_EST']),1);
    $pdf->Cell(30,10,utf8_decode($fila['TEL_EST']),1);
    $pdf->Cell(60,10,utf8_decode($fila['DIR_EST']),1);
    $pdf->Ln();
}
$pdf->Output('D', 'reporte_Estudiante'.$ced.'.pdf');  
}
