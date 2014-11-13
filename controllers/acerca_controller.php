<?php

require_once 'defecto_controller.php';

//Llamada al modelo
class acerca_controller extends defecto_controller {

    function _listarAction() {
       
//Llamada a la vista
        $this->render('', "views/default/acerca.php");
    }

}
?>