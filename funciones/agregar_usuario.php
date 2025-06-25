<?php
include 'conexion.php';
$id = $_POST['ID_USU'];
$nombre = $_POST['NOM_USU'];
$contraseña = $_POST['CON_USU'];
$hash = password_hash($contraseña, PASSWORD_DEFAULT);
$rol =$_POST['ROL_USU'];
$query = "INSERT INTO usuarios (ID_USU, NOM_USU, CON_USU, ROL_USU) VALUES ('$id','$nombre','$hash','$rol')";

if ($con->query($query) === TRUE) {
    echo '
    <script>
        alert("Persona agregada");
        window.location.href = "../index.php?action=admin";
    </script>
    ';
    exit();

} else {
    echo "Error updating record: " ;
}

?>
