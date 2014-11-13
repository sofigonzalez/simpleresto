<?php
function validarUsuario($rol=NULL)
{
	if (isset($_POST['cerrarSesion'])) {
	session_destroy();
    $_SESSION['user']='a';
	$_SESSION['password']='a';
	setcookie("usuario", "");
	setcookie("pass", "");
	unset($_COOKIE['usuario']);
	unset($_COOKIE['pass']);
}

	$usuario=isset($_POST['user']) ? $_POST['user'] : '';
    $sessionUsuario=isset($_SESSION['user']) ? $_SESSION['user'] : '';
		if ($usuario=='' and $sessionUsuario!='') {$usuario=$sessionUsuario;};
	$pass=isset($_POST['password']) ? $_POST['password'] : '';
    $sessionPass=isset($_SESSION['password']) ? $_SESSION['password'] : '';
		if ($pass=='' and $sessionPass!='') {$pass=$sessionPass;};


$u = new usuarios;
$u->setusuario($usuario);
$u->setpass($pass);
$u->Validar();
$idU=0;
$idU=$u->getId();
if (!($idU>0))
{
    // session_destroy();
   imprimirLogin();
return FALSE;
}else{
    echo '
						
						<form action="" method="post" ><input style="position:fixed;" name="cerrarSesion" type="submit" value="Salir" class="botonCerrarSesion";/></form>
						';
    $_SESSION['user']=$u->getUsuario();
	$_SESSION['password']=$u->getPass();
    //echo 'OK--------';

    $per=new permisos();
// aca se definen los permisos sobre el sitio
    $per->setid_usuarios($u->getId());
    $per->setid_roles($rol);
    $per->validar();
    if (($per->getId()>0))
    {

  //  echo 'OK--------2';
    return TRUE;
    }else
    {
           imprimirLogin();
           return FALSE;
        }
    }
}
function imprimirLogin()
{
     echo '
    
<form action="" method="post" class="login">
    <div><label>Usuario</label><input id="user" name="user" type="text" autofocus></div>
    <div><label>Contrase&ntilde;a</label><input id="password" name="password" type="password"></div>
		<div><input name="login" type="submit" value="Ingresar"></div></form>
<br /><br />
';
    }