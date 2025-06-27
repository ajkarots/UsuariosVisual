<?php
include 'conexion.php';
$ced = $_POST['CED_EST'];
$nombre = $_POST['NOM_EST'];
$apellido = $_POST['APE_EST'];
$telefono =$_POST['TEL_EST'];
$direccion =$_POST['DIR_EST'];
$query = "INSERT INTO estudiantes (CED_EST, NOM_EST, APE_EST, TEL_EST , DIR_EST) VALUES ('$ced','$nombre','$apellido','$telefono','$direccion')";

if ($con->query($query) === TRUE) {
    echo '
    <script>
        alert("Estudiante agregada");
        window.location.href = "../index.php?action=admin";
    </script>
    ';
    exit();

} else {
    echo "Error updating record: " ;
}

?>
