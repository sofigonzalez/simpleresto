<?php

class reloj
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
	private $fecha;

	/**
	* @var
	*/
	private $tipo;

	/**
	* @var string
	*/
	private $observacion;

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
		$query = "SELECT * FROM reloj WHERE `id`='{$this->getid()}'";

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
		$query = "UPDATE reloj SET
						`id_usuarios` = '" . mysql_real_escape_string($this->getid_usuarios(),$dblink) . "',
						`fecha` = '" . mysql_real_escape_string($this->getfecha(),$dblink) . "',
						`tipo` = '" . mysql_real_escape_string($this->gettipo(),$dblink) . "',
						`observacion` = '" . mysql_real_escape_string($this->getobservacion(),$dblink) . "'
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
		$query ="INSERT INTO reloj (`id_usuarios`,`fecha`,`tipo`,`observacion`) VALUES ('" . mysql_real_escape_string($this->getid_usuarios(),$dblink) . "','" . mysql_real_escape_string($this->getfecha(),$dblink) . "','" . mysql_real_escape_string($this->gettipo(),$dblink) . "','" . mysql_real_escape_string($this->getobservacion(),$dblink) . "');";
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

	public function setfecha($fecha='')
	{
		$this->fecha = $fecha;
		return true;
	}

	public function getfecha()
	{
		return $this->fecha;
	}

	public function settipo($tipo='')
	{
		$this->tipo = $tipo;
		return true;
	}

	public function gettipo()
	{
		return $this->tipo;
	}

	public function setobservacion($observacion='')
	{
		$this->observacion = $observacion;
		return true;
	}

	public function getobservacion()
	{
		return $this->observacion;
	}

} // END class reloj