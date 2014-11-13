<?php
require_once 'defecto_controller.php';
//Llamada al modelo
class usuarios_controller extends defecto_controller{
    
    function _listarAction() {
        require_once("models/usuarios_model.php");
        $obj = new usuarios();
        $datos = $obj->SelectAll();

        $this->render($datos,"views/usuarios/listar.php");
    }

    public function _editar() {
        require_once("models/usuarios_model.php");
        
        $datos = new usuarios($_GET['idUsuario']);
        $this->render($datos,"views/usuarios/editar.php");
    }

    function _guardar() {
        require_once("models/usuarios_model.php");

        if ($_POST['iduser'] != NULL) {
            //aca se hace update
            if (
                    (strlen(isset($_POST['useruser']) ? $_POST['useruser'] : '')) >= 1 and ( strlen(isset($_POST['passworduser']) ? $_POST['passworduser'] : '')) >= 1 and ( strlen(isset($_POST['nombreuser']) ? $_POST['nombreuser'] : '')) >= 1 and
                    $_POST['passworduser'] == $_POST['repassworduser']
            ) {
                $uu = new usuarios();

                $uu->setid(isset($_POST['iduser']) ? $_POST['iduser'] : '');
                $uu->setusuario(isset($_POST['useruser']) ? $_POST['useruser'] : '');
                $uu->setnombre(isset($_POST['nombreuser']) ? $_POST['nombreuser'] : '');
                $uu->setpass(isset($_POST['passworduser']) ? $_POST['passworduser'] : '');
                $uu->settelefono(isset($_POST['telefonouser']) ? $_POST['telefonouser'] : '');
                $uu->setmail(isset($_POST['mailuser']) ? $_POST['mailuser'] : '');
                $uu->setdireccion(isset($_POST['direccionuser']) ? $_POST['direccionuser'] : '');

                $uu->Save();
            }
        } else {//aca se hace create
            if (
                    (strlen(isset($_POST['useruser']) ? $_POST['useruser'] : '')) >= 1 and ( strlen(isset($_POST['passworduser']) ? $_POST['passworduser'] : '')) >= 1 and ( strlen(isset($_POST['nombreuser']) ? $_POST['nombreuser'] : '')) >= 1 and
                    $_POST['passworduser'] == $_POST['repassworduser']
            ) {
                $uu = new usuarios();
                $uu->setusuario(isset($_POST['useruser']) ? $_POST['useruser'] : '');
                $uu->setnombre(isset($_POST['nombreuser']) ? $_POST['nombreuser'] : '');
                $uu->setpass(isset($_POST['passworduser']) ? $_POST['passworduser'] : '');
                $uu->settelefono(isset($_POST['telefonouser']) ? $_POST['telefonouser'] : '');
                $uu->setmail(isset($_POST['mailuser']) ? $_POST['mailuser'] : '');
                $uu->setdireccion(isset($_POST['direccionuser']) ? $_POST['direccionuser'] : '');

                $uu->Create();
            }
        }

//Llamada a la vista
//require_once("views/usuarios/editar.php");
        $this->_listarAction();
    }

}
