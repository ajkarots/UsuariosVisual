<?php
class MVcontroller{
    public function template(){
    include "views/template.php";
    }
    public function enlacesPaginasController(){
        if(isset($_GET['action'])){
            $enlacesController=$_GET['action'];
        }
        else{
            $enlacesController= 'inicio';
        }
        $enlacesPaginas = new EnlacesPaginas();
        $respuesta = $enlacesPaginas->enlacesPaginasModel($enlacesController);
        include $respuesta;
    }
}
?>