<?php
require_once 'defecto_controller.php';
//Llamada al modelo
class mesasImg_controller extends defecto_controller{
    
    
function _listarAction() {
require_once("models/mesas_model.php");
$pro=new mesas();
$datos=$pro->SelectAll();
//Llamada a la vista
$this->render($datos,"views/mesasImg/listar.php");
}

function _nuevoPedido() {
require_once("models/mesas_model.php");
require_once("models/clientes_model.php");
require_once("models/pedidos_model.php");
require_once("models/productos_model.php");
require_once("models/items_model.php");

$mesa=new mesas($_GET['idMesas']);

if (isset($_POST['id_clientes'])) {
    $nuevoPedido = new pedidos();
    $nuevoPedido->setestado('N');
    $nuevoPedido->setobservaciones($_POST['observaciones']);
    $nuevoPedido->setid_clientes($_POST['id_clientes']);
    $nuevoPedido->setid_mesas($_GET['idMesas']);
    $nuevoPedido->CreateInicial();
    
}


$pedidoActivo=new pedidos();
$pedidoActivo->PedidoActivo($_GET['idMesas']);
if ($pedidoActivo->getid_mesas()==NULL)
{
    $clientes=new clientes();
    $datos=$clientes->SelectAll();
    $this->render($datos,"views/mesasImg/clientes.php");
}
else
{

    if (isset($_POST['id_productos']))
    {
        $productoAgregado=new productos($_POST['id_productos']);
        $nuevoItem = new items();
        $nuevoItem->setid_pedidos($pedidoActivo->getid());
        $nuevoItem->setid_productos($_POST['id_productos']);
        $nuevoItem->setestado('P');
        $nuevoItem->setprecio($productoAgregado->getprecio());
        $nuevoItem->Create();
    }
    
    if (isset($_GET['idBorrar']))
    {
        $borrarItem = new items($_GET['idBorrar']);
        $borrarItem->delete();
    }
    
    $productos=new productos();
    $items=new items();
    $d1=$items->SelectAll($pedidoActivo->getid());
    $d2=$productos->SelectAll();
    $datos=array("items"=>$d1, "productos"=>$d2);
    $this->render($datos,"views/mesasImg/items.php");
}
}


}
?>
