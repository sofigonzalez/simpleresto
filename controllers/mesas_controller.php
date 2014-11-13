<?php
require_once 'defecto_controller.php';
//Llamada al modelo
class mesas_controller extends defecto_controller{
function _listarAction() {
require_once("models/mesas_model.php");
$pro=new mesas();
$datos=$pro->SelectAll();
//Llamada a la vista
$this->render($datos,"views/mesas/listar.php");
}


public function _editar() {
        require_once("models/mesas_model.php");
        $datos = new mesas($_GET['idMesas']);
        $this->render($datos,"views/mesas/editar.php");
    }

    function _guardar() {
        require_once("models/mesas_model.php");

        if ($_POST['idMesas'] != NULL) {
            //aca se hace update
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1 ) {
                $uu = new mesas();

                $uu->setid(isset($_POST['idMesas']) ? $_POST['idMesas'] : '');
                $uu->setubicacionH(isset($_POST['ubicacionH']) ? $_POST['ubicacionH'] : '');
                $uu->setubicacionV(isset($_POST['ubicacionV']) ? $_POST['ubicacionV'] : '');
                $uu->setestado(isset($_POST['estado']) ? $_POST['estado'] : '');
                $uu->setnombre(isset($_POST['nombre']) ? $_POST['nombre'] : '');
                $uu->Save();
            }
        } else {//aca se hace create
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1 ) {
                $uu = new mesas();
                $uu->setubicacionH(isset($_POST['ubicacionH']) ? $_POST['ubicacionH'] : '');
                $uu->setubicacionV(isset($_POST['ubicacionV']) ? $_POST['ubicacionV'] : '');
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
