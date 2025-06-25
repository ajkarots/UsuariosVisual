<?php
require('../fpdf186/fpdf.php');
require('conexion.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
$sql = 'SELECT * FROM usuarios WHERE ID_USU=?';
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $id);
$stmt->execute();
$respuesta= $stmt->get_result();

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetTitle("USUARIOS");
$pdf->SetFont('Arial','B',16);
$pdf->cell(40,10,'Usuario',1);
$pdf->cell(50,10,'Nombre',1);
$pdf->cell(50,10,'Rol',1);
$pdf->Ln();
if($fila=$respuesta->fetch_array()){
    $pdf->Cell(40,10,$fila['ID_USU'],1);
    $pdf->Cell(50,10,$fila['NOM_USU'],1);
    $pdf->Cell(50,10,$fila['ROL_USU'],1);
    $pdf->Ln();
}
$pdf->Output('D', 'reporte_individual.pdf');  
}
