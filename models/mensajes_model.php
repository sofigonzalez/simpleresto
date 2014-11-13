<?php
/******************************************************************************
* Class for simpleresto.mensajes
*******************************************************************************/

class mensajes
{
	/**
	* @var int
	* Class Unique ID
	*/
	private $id;

	/**
	* @var int
	*/
	private $id_usuarios;

	/**
	* @var int
	*/
	private $id_usuarios_recibe;

	/**
	* @var
	*/
	private $estado;

	/**
	* @var string
	*/
	private $mensaje;

	/**
	* @var int
	*/
	private $fecha;

	public function __construct($id='')
	{
		$this->setid($id);
		$this->Load();
	}

	private function Load()
	{
		$dblink = null;

		try
		{
			$dblink = mysql_connect(DB_HOST,DB_USER,DB_PASS);
			mysql_select_db(DB_BASE,$dblink);
		}
		catch(Exception $ex)
		{
			echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
			echo "Error: " . $ex->message;
			exit;
		}
		$query = "SELECT * FROM mensajes WHERE `id`='{$this->getid()}'";

		$result = mysql_query($query,$dblink);

		while($row = mysql_fetch_assoc($result) )
			foreach($row as $key => $value)
			{
				$column_name = str_replace('-','_',$key);
				$this->{"set$column_name"}($value);

			}
		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function Save()
	{
		$dblink = null;

		try
		{
			$dblink = mysql_connect(DB_HOST,DB_USER,DB_PASS);
			mysql_select_db(DB_BASE,$dblink);
		}
		catch(Exception $ex)
		{
			echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
			echo "Error: " . $ex->message;
			exit;
		}
		$query = "UPDATE mensajes SET
						`id_usuarios` = '" . mysql_real_escape_string($this->getid_usuarios(),$dblink) . "',
						`id_usuarios_recibe` = '" . mysql_real_escape_string($this->getid_usuarios_recibe(),$dblink) . "',
						`estado` = '" . mysql_real_escape_string($this->getestado(),$dblink) . "',
						`mensaje` = '" . mysql_real_escape_string($this->getmensaje(),$dblink) . "',
						`fecha` = '" . mysql_real_escape_string($this->getfecha(),$dblink) . "'
						WHERE `id`='{$this->getid()}'";

		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function Create()
	{
		$dblink = null;

		try
		{
			$dblink = mysql_connect(DB_HOST,DB_USER,DB_PASS);
			mysql_select_db(DB_BASE,$dblink);
		}
		catch(Exception $ex)
		{
			echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
			echo "Error: " . $ex->message;
			exit;
		}
		$query ="INSERT INTO mensajes (`id_usuarios`,`id_usuarios_recibe`,`estado`,`mensaje`,`fecha`) VALUES ('" . mysql_real_escape_string($this->getid_usuarios(),$dblink) . "','" . mysql_real_escape_string($this->getid_usuarios_recibe(),$dblink) . "','" . mysql_real_escape_string($this->getestado(),$dblink) . "','" . mysql_real_escape_string($this->getmensaje(),$dblink) . "','" . mysql_real_escape_string($this->getfecha(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}

	public function setid($id='')
	{
		$this->id = $id;
		return true;
	}

	public function getid()
	{
		return $this->id;
	}

	public function setid_usuarios($id_usuarios='')
	{
		$this->id_usuarios = $id_usuarios;
		return true;
	}

	public function getid_usuarios()
	{
		return $this->id_usuarios;
	}

	public function setid_usuarios_recibe($id_usuarios_recibe='')
	{
		$this->id_usuarios_recibe = $id_usuarios_recibe;
		return true;
	}

	public function getid_usuarios_recibe()
	{
		return $this->id_usuarios_recibe;
	}

	public function setestado($estado='')
	{
		$this->estado = $estado;
		return true;
	}

	public function getestado()
	{
		return $this->estado;
	}

	public function setmensaje($mensaje='')
	{
		$this->mensaje = $mensaje;
		return true;
	}

	public function getmensaje()
	{
		return $this->mensaje;
	}

	public function setfecha($fecha='')
	{
		$this->fecha = $fecha;
		return true;
	}

	public function getfecha()
	{
		return $this->fecha;
	}

} // END class mensajes
