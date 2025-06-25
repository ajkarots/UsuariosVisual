<?php
include 'conexion.php';
$id = $_POST['ID_USU'];
$nombre = $_POST['NOM_USU'];
$contraseña = $_POST['CON_USU'];
$hash = password_hash($contraseña, PASSWORD_DEFAULT);
$query = "INSERT INTO usuarios (ID_USU, NOM_USU, CON_USU, ROL_USU) VALUES ('$id','$nombre','$hash','usuario')";

if ($con->query($query) === TRUE) {
    echo '
    <script>
        alert("Persona agregada");
        window.location.href = "../index.php?action=inicio";
    </script>
    ';
    exit();

} else {
    echo "Error updating record: " ;
}

?>
