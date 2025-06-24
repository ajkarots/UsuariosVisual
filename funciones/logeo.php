<?php
require_once 'conexion.php';
session_start();
$usuario = $_POST["ID_USU"];
$contraseña = $_POST["CON_USU"];
$sql = "SELECT * FROM USUARIOS WHERE ID_USU =? AND CON_USU=?";
$stmt = $con->prepare($sql);
if($stmt){
$stmt->bind_param("ss",$usuario,$contraseña);
$stmt->execute();
$resultado = $stmt->get_result();
$rol= $resultado->fetch_assoc();
if($resultado->num_rows == 0){
    echo "<script>alert('Usuario o contraseña incorrectos');</script>";
}
else{
    $_SESSION['usuario'] = $rol ['ID_USU'];
    echo "<script> window.location.href='../index.php?action=inicio';</script>";
    //header("Location: ../servicios.php");
}
}

?>