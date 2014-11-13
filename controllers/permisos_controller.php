<?php
require_once 'defecto_controller.php';
//Llamada al modelo
class permisos_controller extends defecto_controller{
function _listarAction() {
require_once("models/permisos_model.php");
require_once("models/roles_model.php");

$idUsuarioo = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : 0;
$roles = isset($_POST['roles']) ? $_POST['roles'] : 0;
$rolesxusuario = isset($_POST['rolesxusuario']) ? $_POST['rolesxusuario'] : 0;

if (isset($_POST['agregar']))
{
	$p=new permisos();
	$p->setid_usuarios($idUsuarioo);
	$p->setid_roles($roles);
	$p->Create();
}
if (isset($_POST['quitar']))
{
	$p=new permisos();
	$p->setid_usuarios($idUsuarioo);
	$p->setid_roles($rolesxusuario);
	$p->Delete();
}
$rol=new roles();
$array = $rol->SelectAll();
$array2 = $rol->selectAllxIdusuario($idUsuarioo);
$datos=  array($array, $array2);
$this->render($datos,"views/permisos/listar.php");
//require_once("views/permisos/listar.php");
}
}

?>