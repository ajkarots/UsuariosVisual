<?php
class EnlacesPaginas
{
    public static function enlacesPaginasModel($enlaceModel){
        if($enlaceModel == "inicio" || $enlaceModel == "admin" || $enlaceModel == "editar" || $enlaceModel == "agregar" || $enlaceModel == "login" || $enlaceModel == "sesiones"
            ||$enlaceModel=="registrar" || $enlaceModel=="contactanos" ||$enlaceModel=="nosotros" || $enlaceModel=="editar_estudiante" || $enlaceModel=='agregarEstudiante'){
            return  "views/" . $enlaceModel.".php";
        }
        else{
            return "views/inicio.php";
        }
        
    }
}
?>