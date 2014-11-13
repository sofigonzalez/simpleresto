<?php
require_once 'defecto_controller.php';
//Llamada al modelo
class caja_controller extends defecto_controller{
function _listarAction() {
require_once("models/caja_model.php");
$pro=new caja();
$datos=$pro->SelectAll();
//Llamada a la vista
$this->render($datos,"views/caja/listar.php");
}


public function _editar() {
        require_once("models/caja_model.php");
        $datos = new caja($_GET['idCaja']);
        $this->render($datos,"views/caja/editar.php");
    }

    function _guardar() {
        require_once("models/caja_model.php");

        if ($_POST['idCaja'] != NULL) {
            //aca se hace update
            $uu = new caja();

                $uu->setid(isset($_POST['idCaja']) ? $_POST['idCaja'] : '');
                $uu->setestado(isset($_POST['estado']) ? $_POST['estado'] : '');
                $uu->setobservacion(isset($_POST['observacion']) ? $_POST['observacion'] : '');
                $uu->Save();
            
        } else {//aca se hace create
                $uu = new caja();
                $uu->setestado(isset($_POST['estado']) ? $_POST['estado'] : '');
                $uu->setobservacion(isset($_POST['observacion']) ? $_POST['observacion'] : '');
                $uu->Create();
            
        }

//Llamada a la vista
//require_once("views/usuarios/editar.php");
        $this->_listarAction();
    }
}
?>
