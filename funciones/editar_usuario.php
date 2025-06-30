<?php
include 'conexion.php';
if(isset($_POST['id'])){
    $ID = $_POST['id'];
    $nombre = $_POST['NOM_USU'];
    $contraseña = $_POST['CON_USU'];
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $rol = $_POST['ROL_USU'];
    $sql = 'UPDATE usuarios SET NOM_USU=?,CON_USU=?,ROL_USU=? WHERE ID_USU=?';
    $stmt = $con->prepare($sql);

    if($stmt){
        $stmt->bind_param('ssss',$nombre,$hash,$rol,$ID);
        if($stmt->execute()){
            header('Location: ../index.php?action=admin');
            exit();
        }
        else{
            echo "Error al actualizar";
        }
        $stmt->close();
    }else{
        echo "No se puedo conectar";
    }
    }else{
        echo "Id invalido";
    }

    
?>