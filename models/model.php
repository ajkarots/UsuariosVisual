<?php
class EnlacesPaginas
{
    public static function enlacesPaginasModel($enlaceModel){
        if($enlaceModel == "inicio" || $enlaceModel == "admin" || $enlaceModel == "editar" || $enlaceModel == "agregar" || $enlaceModel == "login"){
            return  "views/" . $enlaceModel.".php";
        }
        else{
            return "views/inicio.php";
        }
        
    }
}
?>