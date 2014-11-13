<?php

/* * ****************************************************************************
 * Class for simpleresto.usuarios
 * ***************************************************************************** */

class usuarios {

    /**
     * @var int
     * Class Unique ID
     */
    private $id;

    /**
     * @var string
     */
    private $usuario;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $direccion;

    public function __construct($id = '') {
        $this->setid($id);
        $this->Load();
    }

    private function Load() {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "SELECT * FROM usuarios WHERE `id`='{$this->getid()}'";

        $result = mysql_query($query, $dblink);

        while ($row = mysql_fetch_assoc($result))
            foreach ($row as $key => $value) {
                $column_name = str_replace('-', '_', $key);
                $this->{"set$column_name"}($value);
            }
        if (is_resource($dblink))
            mysql_close($dblink);
    }

    public function Save() {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "UPDATE usuarios SET
						`usuario` = '" . mysql_real_escape_string($this->getusuario(), $dblink) . "',
						`pass` = '" . mysql_real_escape_string($this->getpass(), $dblink) . "',
						`nombre` = '" . mysql_real_escape_string($this->getnombre(), $dblink) . "',
						`telefono` = '" . mysql_real_escape_string($this->gettelefono(), $dblink) . "',
						`mail` = '" . mysql_real_escape_string($this->getmail(), $dblink) . "',
						`direccion` = '" . mysql_real_escape_string($this->getdireccion(), $dblink) . "'
						WHERE `id`='{$this->getid()}'";

        mysql_query($query, $dblink);

        if (is_resource($dblink))
            mysql_close($dblink);
    }

    public function Create() {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "INSERT INTO usuarios (`usuario`,`pass`,`nombre`,`telefono`,`mail`,`direccion`) VALUES ('" . mysql_real_escape_string($this->getusuario(), $dblink) . "','" . mysql_real_escape_string($this->getpass(), $dblink) . "','" . mysql_real_escape_string($this->getnombre(), $dblink) . "','" . mysql_real_escape_string($this->gettelefono(), $dblink) . "','" . mysql_real_escape_string($this->getmail(), $dblink) . "','" . mysql_real_escape_string($this->getdireccion(), $dblink) . "');";
        mysql_query($query, $dblink);

        if (is_resource($dblink))
            mysql_close($dblink);
    }

    public function Validar() {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "SELECT * FROM usuarios WHERE `usuario`='{$this->getusuario()}' and `pass`='{$this->getpass()}'";

        $result = mysql_query($query, $dblink);

        while ($row = mysql_fetch_assoc($result))
            foreach ($row as $key => $value) {
                $column_name = str_replace('-', '_', $key);
                $this->{"set$column_name"}($value);
            }
        if (is_resource($dblink))
            mysql_close($dblink);
    }

    public function SelectAll() {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "SELECT * FROM usuarios order by nombre";

        $result = mysql_query($query, $dblink);
        if (is_resource($dblink))
            mysql_close($dblink);
        return $result;
        /*
          while($row = mysql_fetch_assoc($result) )
          foreach($row as $key => $value)
          {
          $column_name = str_replace('-','_',$key);
          $this->{"set$column_name"}($value);

          }
         */
    }

    public function imprimirLogin() {
        echo '
    <style type="text/css">
	.button-8 {
	background:#25A6E1;
	background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
	background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#25A6E1",endColorstr="#188BC0",GradientType=0);
	padding:8px 13px;
	color:#fff;
	font-family:"Helvetica Neue",sans-serif;
	font-size:17px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #1A87B9
}
	form.login {
		font-size: 14px;
		background: none repeat scroll 0 0 #F1F1F1;
		border: 1px solid #DDDDDD;
		font-family: sans-serif;
		margin: 0 auto;
		padding: 20px;
		width: 278px;
		box-shadow: 0px 0px 20px black;
		border-radius: 10px;
	}
	form.login div {
		margin-bottom: 15px;
		overflow: hidden;
	}
	form.login div label {
		display: block;
		float: left;
		line-height: 25px;
	}
	form.login div input[type="text"], form.login div input[type="password"] {
		border: 1px solid #DCDCDC;
		float: right;
		padding: 4px;
	}
	form.login div input[type="submit"] {
		background: none repeat scroll 0 0 #DEDEDE;
		border: 1px solid #C6C6C6;
		float: right;
		font-weight: bold;
		padding: 4px 20px;
	}
	.error {
		color: red;
		font-weight: bold;
		margin: 10px;
		text-align: center;
	}
</style>
<br/><br/>
<form action="" method="post" class="login">
    <div><label>Usuario</label><input id="user" name="user" type="text" autofocus></div>
    <div><label>Contrase&ntilde;a</label><input id="password" name="password" type="password"></div>
		<div><input name="login" type="submit" value="Ingresar"></div></form>
<br /><br />
';
        exit();
    }

    public function validarUsuario($rol = NULL) {
        if (isset($_POST['cerrarSesion'])) {
            session_destroy();
            $_SESSION['user'] = 'a';
            $_SESSION['password'] = 'a';
            setcookie("usuario", "");
            setcookie("pass", "");
            unset($_COOKIE['usuario']);
            unset($_COOKIE['pass']);
        }

        $usuario = isset($_POST['user']) ? $_POST['user'] : '';
        $sessionUsuario = isset($_SESSION['user']) ? $_SESSION['user'] : '';
        if ($usuario == '' and $sessionUsuario != '') {
            $usuario = $sessionUsuario;
        };
        $pass = isset($_POST['password']) ? $_POST['password'] : '';
        $sessionPass = isset($_SESSION['password']) ? $_SESSION['password'] : '';
        if ($pass == '' and $sessionPass != '') {
            $pass = $sessionPass;
        };


        $this->setusuario($usuario);
        $this->setpass($pass);
        $this->Validar();
        $idU = 0;
        $idU = $this->getId();
        if (!($idU > 0)) {
            // session_destroy();
            $this->imprimirLogin();
            return FALSE;
        } else {
            echo '
						<style type="text/css">
  							.botonCerrarSesion{
        						font-size:10px;
        						font-family:Verdana,Helvetica;
        						font-weight:bold;
        						color:white;
        						background:#638cb5;
        						border:0px;
        						/*width:80px;*/
        						height:19px;
								/*bottom=1px;*/
								top:60px;
								right:15px;
       								}
						</style>
						<form action="" method="post" ><input style="position:fixed;" name="cerrarSesion" type="submit" value="Salir" class="botonCerrarSesion";/></form>
						';
            $_SESSION['user'] = $this->getusuario();
            $_SESSION['password'] = $this->getpass();
            //echo 'OK--------';
/*
            $per = new permisos();
// aca se definen los permisos sobre el sitio
            $per->setid_usuarios($u->getId());
            $per->setid_roles($rol);
            $per->validar();
            if (($per->getId() > 0)) {

                //  echo 'OK--------2';
                return TRUE;
            } else {
                imprimirLogin();
                return FALSE;
            }
 * 
 */
        }
    }

    public function validarPermisos() {

        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "SELECT * FROM permisos WHERE `id_usuarios`='{$this->getid_usuarios()}' and `id_roles`='{$this->getid_roles()}'";

        $result = mysql_query($query, $dblink);

        while ($row = mysql_fetch_assoc($result))
            foreach ($row as $key => $value) {
                $column_name = str_replace('-', '_', $key);
                $this->{"set$column_name"}($value);
            }
        if (is_resource($dblink))
            mysql_close($dblink);
    }

    public function Idxusuario($usuario) {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "SELECT * FROM usuarios WHERE `usuario`='{$usuario}'";

        $result = mysql_query($query, $dblink);

        while ($row = mysql_fetch_assoc($result))
            foreach ($row as $key => $value) {
                $column_name = str_replace('-', '_', $key);
                $this->{"set$column_name"}($value);
            }
        if (is_resource($dblink))
            mysql_close($dblink);
    }

    public function setid($id = '') {
        $this->id = $id;
        return true;
    }

    public function getid() {
        return $this->id;
    }

    public function setusuario($usuario = '') {
        $this->usuario = $usuario;
        return true;
    }

    public function getusuario() {
        return $this->usuario;
    }

    public function setpass($pass = '') {
        $this->pass = $pass;
        return true;
    }

    public function getpass() {
        return $this->pass;
    }

    public function setnombre($nombre = '') {
        $this->nombre = $nombre;
        return true;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function settelefono($telefono = '') {
        $this->telefono = $telefono;
        return true;
    }

    public function gettelefono() {
        return $this->telefono;
    }

    public function setmail($mail = '') {
        $this->mail = $mail;
        return true;
    }

    public function getmail() {
        return $this->mail;
    }

    public function setdireccion($direccion = '') {
        $this->direccion = $direccion;
        return true;
    }

    public function getdireccion() {
        return $this->direccion;
    }

}

// END class usuarios