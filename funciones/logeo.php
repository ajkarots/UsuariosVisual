<?php
require_once 'conexion.php';
session_start();

$usuario = $_POST["ID_USU"];
$contraseña = $_POST["CON_USU"];


$sql = "SELECT * FROM usuarios WHERE ID_USU = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>alert('Usuario no registrado'); window.history.back();</script>";
    exit;
}

$datosUsuario = $result->fetch_assoc();


if ($datosUsuario['INT_USU'] >= 3) {
    echo "<script>alert('Usuario bloqueado por múltiples intentos fallidos. Contacte al administrador.'); window.history.back();</script>";
    exit;
}


if ($contraseña === $datosUsuario['CON_USU']) {

    $resetSql = "UPDATE usuarios SET INT_USU = 0 WHERE ID_USU = ?";
    $resetStmt = $con->prepare($resetSql);
    $resetStmt->bind_param("s", $usuario);
    $resetStmt->execute();

    $ip = obtenerIP();
    $intentoActual = $datosUsuario['INT_USU'];
    $auditoriaSql = "INSERT INTO auditoria_sesiones (ID_USU, EXITO, IP_USUARIO, INTENTO_NRO) VALUES (?, 1, ?, ?)";
    $auditoriaStmt = $con->prepare($auditoriaSql);
    $auditoriaStmt->bind_param("ssi", $usuario, $ip, $intentoActual);
    $auditoriaStmt->execute();


    $_SESSION['usuario'] = $datosUsuario['ID_USU'];
    echo "<script>window.location.href='../index.php?action=inicio';</script>";
} else {
    $intentos = $datosUsuario['INT_USU'] + 1;
    $updateSql = "UPDATE usuarios SET INT_USU = ? WHERE ID_USU = ?";
    $updateStmt = $con->prepare($updateSql);
    $updateStmt->bind_param("is", $intentos, $usuario);
    $updateStmt->execute();

    $ip = obtenerIP();
    $intentoNuevo = $datosUsuario['INT_USU'] + 1;

    $auditoriaSql = "INSERT INTO auditoria_sesiones (ID_USU, EXITO, IP_USUARIO, INTENTO_NRO) VALUES (?, 0, ?, ?)";
    $auditoriaStmt = $con->prepare($auditoriaSql);
    $auditoriaStmt->bind_param("ssi", $usuario, $ip, $intentoNuevo);
    $auditoriaStmt->execute();

    if ($intentos >= 3) {
        echo "<script>alert('Usuario bloqueado tras 3 intentos fallidos.'); window.history.back();</script>";
    } else {
        echo "<script>alert('Contraseña incorrecta. Intento $intentos de 3.'); window.history.back();</script>";
    }
}


function obtenerIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    return $_SERVER['REMOTE_ADDR'];
}
