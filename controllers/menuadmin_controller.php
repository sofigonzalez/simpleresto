<?php
require_once 'defecto_controller.php';
//Llamada al modelo
class menuadmin_controller extends defecto_controller{
function _listarAction() {
$datos="";
//Llamada a la vista
$this->render($datos,"views/menuadmin/listar.php");
}

}
?>
