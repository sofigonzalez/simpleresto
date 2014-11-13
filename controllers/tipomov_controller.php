<?php
require_once 'defecto_controller.php';
//Llamada al modelo
class tipomov_controller extends defecto_controller{
function _listarAction() {
require_once("models/tipomov_model.php");
$pro=new tipomov();
$datos=$pro->SelectAll();
//Llamada a la vista
$this->render($datos,"views/tipomov/listar.php");
}


public function _editar() {
        require_once("models/tipomov_model.php");
        $datos = new tipomov($_GET['idtipomov']);
        $this->render($datos,"views/tipomov/editar.php");
    }

    function _guardar() {
        require_once("models/tipomov_model.php");

        if ($_POST['idtipomov'] != NULL) {
            //aca se hace update
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1 ) {
                $uu = new tipomov();

                $uu->setid(isset($_POST['idtipomov']) ? $_POST['idtipomov'] : '');
                $uu->setnombre(isset($_POST['nombre']) ? $_POST['nombre'] : '');
                $uu->setsumaResta(isset($_POST['sumaResta']) ? $_POST['sumaResta'] :'' );
                $uu->Save();
            }
        } else {//aca se hace create
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1 ) {
                $uu = new tipomov();
                $uu->setnombre(isset($_POST['nombre']) ? $_POST['nombre'] : '');
                $uu->setsumaResta(isset($_POST['sumaResta']) ? $_POST['sumaResta'] :'' );
                $uu->Create();
            }
        }

//Llamada a la vista
//require_once("views/usuarios/editar.php");
        $this->_listarAction();
    }
}
?>
