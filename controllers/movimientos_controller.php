<?php

require_once 'defecto_controller.php';

//Llamada al modelo
class movimientos_controller extends defecto_controller {

    function _listarAction() {
        require_once("models/movimientos_model.php");
        $pro = new movimientos();
        $datos = $pro->SelectAll();
//Llamada a la vista
        $this->render($datos, "views/movimientos/listar.php");
    }

    public function _editar() {
        require_once("models/movimientos_model.php");
        require_once("models/tipomov_model.php");

        $d = new movimientos($_GET['idMovimientos']);
        $tm = new tipomov();
        $datos = array($d, $tm->SelectAll());
        $this->render($datos, "views/movimientos/editar.php");
    }

    function _guardar() {
        require_once("models/movimientos_model.php");
        if (isset($_GET['idCaja'])) {
            if ($_POST['idMovimientos'] != NULL) {
                //aca se hace update
                $uu = new movimientos();

                $uu->setid($_POST['idMovimientos']);
                $uu->setid_caja($_GET['idCaja']);
                $uu->setid_pedidos(null);
                $uu->setid_tipoMov($_POST['tipomov']);
                $uu->setobservacion($_POST['observacion']);
                $uu->setimporte($_POST['importe']);

                $uu->Save();
            } else {//aca se hace create
                $uu = new movimientos();
                $uu->setid_caja($_GET['idCaja']);
                $uu->setid_pedidos(null);
                $uu->setid_tipoMov($_POST['tipomov']);
                $uu->setobservacion($_POST['observacion']);
                $uu->setimporte($_POST['importe']);
                $uu->CreateSinIdPedido();
            }
        }

//Llamada a la vista
//require_once("views/usuarios/editar.php");
        $this->_listarAction();



    }

}

?>
