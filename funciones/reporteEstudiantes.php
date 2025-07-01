<?php
require('../fpdf186/fpdf.php');
require('conexion.php');

$sql = 'SELECT * FROM estudiantes';
$stmt = $con->query($sql);
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetTitle("ESTUDIANTES");
$pdf->SetFont('Arial','B',16);
$pdf->Cell(20,10, ('Cédula'),     1);
$pdf->Cell(30,10, ('Nombre'),     1);
$pdf->Cell(30,10, ('Apellido'),   1);
$pdf->Cell(30,10, ('Teléfono'),   1);
$pdf->Cell(60,10, ('Dirección'),  1);
$pdf->Ln();
while($fila=$stmt->fetch_object()){
    $CED_EST = $fila->CED_EST;
    $NOM_EST = $fila->NOM_EST;
    $APE_EST = $fila->APE_EST;
    $TEL_EST = $fila->TEL_EST;
    $DIR_EST = $fila->DIR_EST;
    $pdf->Cell(20,10,($CED_EST),1);
    $pdf->Cell(30,10,($NOM_EST),1);
    $pdf->Cell(30,10,($APE_EST),1);
    $pdf->Cell(30,10,($TEL_EST),1);
    $pdf->Cell(60,10,($DIR_EST),1);
    $pdf->Ln();
}
$pdf->Output('D', 'reporte_estudiantes.pdf');  
?>