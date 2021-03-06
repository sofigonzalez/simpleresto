<?php
/******************************************************************************
* Class for simpleresto.entregas
*******************************************************************************/

class entregas
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
	private $id_usuarios_entrega;

	/**
	* @var int
	*/
	private $id_pedidos;

	/**
	* @var int
	*/
	private $fecha;

	/**
	* @var
	*/
	private $estado;

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
		$query = "SELECT * FROM entregas WHERE `id`='{$this->getid()}'";

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
		$query = "UPDATE entregas SET
						`id_usuarios` = '" . mysql_real_escape_string($this->getid_usuarios(),$dblink) . "',
						`id_usuarios_entrega` = '" . mysql_real_escape_string($this->getid_usuarios_entrega(),$dblink) . "',
						`id_pedidos` = '" . mysql_real_escape_string($this->getid_pedidos(),$dblink) . "',
						`fecha` = '" . mysql_real_escape_string($this->getfecha(),$dblink) . "',
						`estado` = '" . mysql_real_escape_string($this->getestado(),$dblink) . "'
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
		$query ="INSERT INTO entregas (`id_usuarios`,`id_usuarios_entrega`,`id_pedidos`,`fecha`,`estado`) VALUES ('" . mysql_real_escape_string($this->getid_usuarios(),$dblink) . "','" . mysql_real_escape_string($this->getid_usuarios_entrega(),$dblink) . "','" . mysql_real_escape_string($this->getid_pedidos(),$dblink) . "','" . mysql_real_escape_string($this->getfecha(),$dblink) . "','" . mysql_real_escape_string($this->getestado(),$dblink) . "');";
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

	public function setid_usuarios_entrega($id_usuarios_entrega='')
	{
		$this->id_usuarios_entrega = $id_usuarios_entrega;
		return true;
	}

	public function getid_usuarios_entrega()
	{
		return $this->id_usuarios_entrega;
	}

	public function setid_pedidos($id_pedidos='')
	{
		$this->id_pedidos = $id_pedidos;
		return true;
	}

	public function getid_pedidos()
	{
		return $this->id_pedidos;
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

	public function setestado($estado='')
	{
		$this->estado = $estado;
		return true;
	}

	public function getestado()
	{
		return $this->estado;
	}

} // END class entregas