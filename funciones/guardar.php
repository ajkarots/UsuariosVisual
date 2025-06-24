<?php
include 'conexion.php';
$cedula=$_POST['CED_EST'];
$nombre=$_POST['NOM_EST'];
$apellido=$_POST['APE_EST'];
$telefono=$_POST['TEL_EST'];
$sql= 'INSERT INTO estudiantes (CED_EST, NOM_EST, APE_EST, TEL_EST) VALUES (?, ?, ?, ?)';
$stmt = $conn->prepare($sql);

if($stmt){
    $stmt->bind_param('ssss', $cedula,$nombre, $apellido, $telefono);
    $stmt->execute();
    $stmt->close();
    echo json_encode(  ["success" =>true,"message"=> "Exito al guardar"] );
}else{
    echo json_encode(["success"=>false,"message" => "Error al guardar"]);
}
?>