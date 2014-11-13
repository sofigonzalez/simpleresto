<?php

require_once 'defecto_controller.php';

//Llamada al modelo
class pedidos_controller extends defecto_controller {

    function _enMesa() {
        require_once("models/mesas_model.php");
        require_once("models/clientes_model.php");
        require_once("models/pedidos_model.php");
        require_once("models/productos_model.php");
        require_once("models/items_model.php");

        
        $pedidoActivo = new pedidos();
        $pedidoActivo->PedidoActivo($_GET['idMesas']);

        
        if (isset($_POST['finalizar']))
        {
            $pedidoActivo->setestado('F');
            $pedidoActivo->Save();
               
            
        }
        if (isset($_POST['cancelar']))
        {
            
            $pedidoActivo->setestado('C');
            $pedidoActivo->Save();
            
        }
        
        $cliente=new clientes($pedidoActivo->getid_clientes());
        
        $items = new items();
        $d1 = $items->SelectAll($pedidoActivo->getid());
        $total = 0;

        while ($x = mysql_fetch_assoc($d1)) {
            $total = $total + $x['precioItem'];
        }
        
        $datos=array("total"=>$total, "cliente"=>$cliente->getnombre());
        $this->render($datos,"views/pedidos/cerrar.php");

        
        
    }

    function _pendientes() {
        require_once("models/pedidos_model.php");
        if (isset($_GET['idEntregado']))
            {
            require_once("models/items_model.php");
            $item=new items($_GET['idEntregado']);
            $item->setestado('E');
            $item->Save();
            }
        
        $pro = new pedidos();
        $datos = $pro->Pendientes();
//Llamada a la vista
        $this->render($datos, "views/pedidos/pendientes.php");
    }

    public function _editar() {
        require_once("models/mesas_model.php");
        $datos = new mesas($_GET['idMesas']);
        $this->render($datos, "views/mesas/editar.php");
    }

    function _guardar() {
        require_once("models/mesas_model.php");

        if ($_POST['idMesas'] != NULL) {
            //aca se hace update
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1) {
                $uu = new mesas();

                $uu->setid(isset($_POST['idMesas']) ? $_POST['idMesas'] : '');
                $uu->setubicacionH(isset($_POST['ubicacionH']) ? $_POST['ubicacionH'] : '');
                $uu->setubicacionV(isset($_POST['ubicacionV']) ? $_POST['ubicacionV'] : '');
                $uu->setestado(isset($_POST['estado']) ? $_POST['estado'] : '');
                $uu->setnombre(isset($_POST['nombre']) ? $_POST['nombre'] : '');
                $uu->Save();
            }
        } else {//aca se hace create
            if ((strlen(isset($_POST['nombre']) ? $_POST['nombre'] : '')) >= 1) {
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

    public function _nuevoPedido() {
        require_once("models/pedidos_model.php");
        $x = new pedidos();
        $datos = $x->SelectAll();
        $this->render($datos, "views/pedidos/items.php");
    }

}

?>
