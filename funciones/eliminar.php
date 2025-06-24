<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $ID = $_GET['id'];

    $sql = 'DELETE FROM usuarios WHERE ID_USU = ?';
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $ID);
        if ($stmt->execute()) {
            header('Location: ../index.php?action=admin');
            exit();
        } else {
            echo "Error al ejecutar ";
        }
        $stmt->close();
    } else {
        echo "Error al borrar";
    }
} else {
    echo "Error al conectarse";
}
?>
