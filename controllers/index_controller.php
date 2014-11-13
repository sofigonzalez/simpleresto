<?php
//Llamada a la vista
require_once 'defecto_controller.php';
//Llamada al modelo
class index_controller extends defecto_controller{
    
function _listarAction() {
    
    $this->render("","views/index/index_view.php");

}

}
