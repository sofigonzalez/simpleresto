<?php
if (isset($_GET['error'])){error_reporting(-1);}else{error_reporting(0);}
session_start();
//error_reporting(-1);
require_once("db/db-config.php");





 
//La carpeta donde buscaremos los controladores
$carpetaControladores = "controllers/";
 
//Si no se indica un controlador, este es el controlador que se usará
$controladorPredefinido = "index";
 
//Si no se indica una accion, esta accion es la que se usará
$accionPredefinida = "_listarAction";
 
if(! empty($_GET['controller']))
      $controlador = $_GET['controller'];
else
      $controlador = $controladorPredefinido;
 
if(! empty($_GET['action']))
      $accion = $_GET['action'];
else
      $accion = $accionPredefinida;
 
//un poco de limpieza
$controlador = preg_replace('/[^a-zA-Z0-9]/', '', $controlador);
$accion = '_' . preg_replace('/[^a-zA-Z0-9]/', '', $accion);
 
//Ya tenemos el controlador y la accion
 
//Formamos el nombre del fichero que contiene nuestro controlador
$controladorarchivo = $carpetaControladores . $controlador . '_controller.php';
 
//Incluimos el controlador o detenemos todo si no existe
if(is_file($controladorarchivo))
      require_once $controladorarchivo;
else
      die('El controlador no existe - 404 not found');
 $controlador=$controlador.'_controller';
$objcontrolador= new $controlador();
$objcontrolador->inicio();
$objcontrolador->$accion();
//echo 'llamo';
//Llamamos la accion o detenemos todo si no existe
//if(is_callable($accion,true,$controlador.'::'.$accion))
//      $controlador->$accion();
//else
//      die('La accion no existe - 404 not found');
?>
