<?php
include("conexion.php");

if (isset($_GET['ced'])) {
    $ced = $_GET['ced'];

    $sql = 'DELETE FROM estudiantes WHERE CED_EST = ?';
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $ced);
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
