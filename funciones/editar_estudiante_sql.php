<?php
include 'conexion.php';
if(isset($_POST['ced'])){
    $CED = $_POST['ced'];
    $nombre = $_POST['NOM_EST'];
    $apellido = $_POST['APE_EST'];
    $telefono = $_POST['TEL_EST'];
    $direccion = $_POST['DIR_EST'];
    $sql = 'UPDATE estudiantes SET NOM_EST=?,APE_EST=?,TEL_EST=?,DIR_EST=? WHERE CED_EST=?';
    $stmt = $con->prepare($sql);

    if($stmt){
        $stmt->bind_param('sssss',$nombre,$apellido,$telefono,$direccion,$CED);
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