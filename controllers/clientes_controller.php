<?php
require_once 'defecto_controller.php';
//Llamada al modelo
class clientes_controller extends defecto_controller{
function _listarAction() {
require_once("models/clientes_model.php");
$pro=new clientes();
$datos=$pro->SelectAll();
//Llamada a la vista
$this->render($datos,"views/clientes/listar.php");
}


public function _editar() {
        require_once("models/clientes_model.php");
        $datos = new clientes($_GET['idClientes']);
        $this->render($datos,"views/clientes/editar.php");
    }

    function _guardar() {
        require_once("models/clientes_model.php");

        if ($_POST['idClientes'] != NULL) {
            //aca se hace update
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1 ) {
                $uu = new clientes();

                $uu->setid(isset($_POST['idClientes']) ? $_POST['idClientes'] : '');
                $uu->setnombre(isset($_POST['nombre']) ? $_POST['nombre'] : '');
                $uu->setdni(isset($_POST['dni']) ? $_POST['dni'] : '');
                $uu->settelefono(isset($_POST['telefono']) ? $_POST['telefono'] : '');
                $uu->setmail(isset($_POST['mail']) ? $_POST['mail'] : '');
                $uu->setdireccion(isset($_POST['direccion']) ? $_POST['direccion'] : '');
                $uu->setfechaNac(isset($_POST['fechaNac']) ? $_POST['fechaNac'] : '');
                $uu->Save();
            }
        } else {//aca se hace create
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1 ) {
                $uu = new clientes();
                
                $uu->setnombre(isset($_POST['nombre']) ? $_POST['nombre'] : '');
                $uu->setdni(isset($_POST['dni']) ? $_POST['dni'] : '');
                $uu->settelefono(isset($_POST['telefono']) ? $_POST['telefono'] : '');
                $uu->setmail(isset($_POST['mail']) ? $_POST['mail'] : '');
                $uu->setdireccion(isset($_POST['direccion']) ? $_POST['direccion'] : '');
                $uu->setfechaNac(isset($_POST['fechaNac']) ? $_POST['fechaNac'] : '');
                $uu->Create();
            }
        }

//Llamada a la vista
//require_once("views/usuarios/editar.php");
        $this->_listarAction();
    }
}
?>
