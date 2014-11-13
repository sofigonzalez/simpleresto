<?php

require_once 'defecto_controller.php';

//Llamada al modelo
class productos_controller extends defecto_controller {

    function _listarAction() {
        require_once("models/productos_model.php");
        $pro = new productos();
        $datos = $pro->SelectAll();
//Llamada a la vista
        $this->render($datos, "views/productos/productos_view.php");
    }

    public function _editar() {
        require_once("models/productos_model.php");
        $datos = new productos($_GET['idProducto']);
        $this->render($datos, "views/productos/editar.php");
    }

    function _guardar() {
        require_once("models/productos_model.php");

        if ($_POST['idProducto'] != NULL) {
            //aca se hace update
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1) {
                $uu = new productos();

                $uu->setid(isset($_POST['idProducto']) ? $_POST['idProducto'] : '');
                $uu->setprecio(isset($_POST['precio']) ? $_POST['precio'] : '');
                $uu->setstock(isset($_POST['stock']) ? $_POST['stock'] : '');
                $uu->setestado(isset($_POST['estado']) ? $_POST['estado'] : '');
                $uu->setnombre(isset($_POST['nombre']) ? $_POST['nombre'] : '');
                $uu->Save();
            }
        } else {//aca se hace create
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1) {
                $uu = new productos();
                $uu->setprecio(isset($_POST['precio']) ? $_POST['precio'] : '');
                $uu->setstock(isset($_POST['stock']) ? $_POST['stock'] : '');
                $uu->setestado(isset($_POST['estado']) ? $_POST['estado'] : '');
                $uu->setnombre(isset($_POST['nombre']) ? $_POST['nombre'] : '');
                $uu->Create();
            }
        }

//Llamada a la vista
//require_once("views/usuarios/editar.php");
        $this->_listarAction();
    }

}

?>
