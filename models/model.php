<?php
class EnlacesPaginas
{
    public static function enlacesPaginasModel($enlaceModel){
        if($enlaceModel == "inicio" || $enlaceModel == "admin" || $enlaceModel == "editar" || $enlaceModel == "agregar" || $enlaceModel == "login" || $enlaceModel == "sesiones"
            ||$enlaceModel=="registrar"){
            return  "views/" . $enlaceModel.".php";
        }
        else{
            return "views/inicio.php";
        }
        
    }
}
?>