<?php
require('../fpdf186/fpdf.php');
require('conexion.php');

$sql = 'SELECT * FROM usuarios';
$stmt = $con->query($sql);
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetTitle("USUARIOS");
$pdf->SetFont('Arial','B',16);
$pdf->cell(40,10,'Usuario',1);
$pdf->cell(50,10,'Nombre',1);
$pdf->cell(50,10,'Rol',1);
$pdf->Ln();
while($fila=$stmt->fetch_object()){
    $ID_USU = $fila->ID_USU;
    $NOM_USU = $fila->NOM_USU;
    $ROL_USU = $fila->ROL_USU;

    
    $pdf->Cell(40,10,$ID_USU,1);
    $pdf->Cell(50,10,$NOM_USU,1);
    $pdf->Cell(50,10,$ROL_USU,1);
    $pdf->Ln();
}
$pdf->Output('D', 'Reporte_usuarios.pdf');  
?>