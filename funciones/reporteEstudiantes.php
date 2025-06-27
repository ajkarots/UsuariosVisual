<?php
require('../fpdf186/fpdf.php');
require('conexion.php');

$sql = 'SELECT * FROM estudiantes';
$stmt = $con->query($sql);
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetTitle("ESTUDIANTES");
$pdf->SetFont('Arial','B',16);
$pdf->Cell(20,10, utf8_decode('Cédula'),     1);
$pdf->Cell(30,10, utf8_decode('Nombre'),     1);
$pdf->Cell(30,10, utf8_decode('Apellido'),   1);
$pdf->Cell(30,10, utf8_decode('Teléfono'),   1);
$pdf->Cell(60,10, utf8_decode('Dirección'),  1);
$pdf->Ln();
while($fila=$stmt->fetch_object()){
    $CED_EST = $fila->CED_EST;
    $NOM_EST = $fila->NOM_EST;
    $APE_EST = $fila->APE_EST;
    $TEL_EST = $fila->TEL_EST;
    $DIR_EST = $fila->DIR_EST;
    $pdf->Cell(20,10,utf8_decode($CED_EST),1);
    $pdf->Cell(30,10,utf8_decode($NOM_EST),1);
    $pdf->Cell(30,10,utf8_decode($APE_EST),1);
    $pdf->Cell(30,10,utf8_decode($TEL_EST),1);
    $pdf->Cell(60,10,utf8_decode($DIR_EST),1);
    $pdf->Ln();
}
$pdf->Output('D', 'reporte_estudiantes.pdf');  
?>