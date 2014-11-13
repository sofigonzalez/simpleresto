<?php

class defecto_controller {

    public function inicio() {
        
    }

    function render($datos, $vista) {

        require_once 'models/usuarios_model.php';
        $usuario=new usuarios();
        $usuario->validarUsuario();

        $carpeta = 'views/default/';
        require_once $carpeta . 'head.php';
        require_once $vista;
        require_once $carpeta . 'footer.php';
        return;
    }

}
