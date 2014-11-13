<?php

/******************************************************************************
* Class for simpleresto.productos
*******************************************************************************/

class productos
{
	/**
	* @var int
	* Class Unique ID
	*/
	private $id;

	/**
	* @var string
	*/
	private $nombre;

	/**
	* @var
	*/
	private $precio;

	/**
	* @var int
	*/
	private $stock;

	/**
	* @var
	*/
	private $estado;

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
		$query = "SELECT * FROM productos WHERE `id`='{$this->getid()}'";

		$result = mysql_query($query,$dblink);

		while($row = mysql_fetch_assoc($result) )
			foreach($row as $key => $value)
			{
				$column_name = str_replace('-','_',$key);
				$this->{"set$column_name"}($value);

			}
		if(is_resource($dblink)) mysql_close($dblink);
	}
	
	public function SelectAll()
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
		$query = "SELECT * FROM productos order by nombre";

		$result = mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
		
		return $result;
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
		$query = "UPDATE productos SET
						`nombre` = '" . mysql_real_escape_string($this->getnombre(),$dblink) . "',
						`precio` = '" . mysql_real_escape_string($this->getprecio(),$dblink) . "',
						`stock` = '" . mysql_real_escape_string($this->getstock(),$dblink) . "',
						`estado` = '" . mysql_real_escape_string($this->getestado(),$dblink) . "',
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
		$query ="INSERT INTO productos (`nombre`,`precio`,`stock`,`estado`,`fecha`) VALUES ('" . mysql_real_escape_string($this->getnombre(),$dblink) . "','" . mysql_real_escape_string($this->getprecio(),$dblink) . "','" . mysql_real_escape_string($this->getstock(),$dblink) . "','" . mysql_real_escape_string($this->getestado(),$dblink) . "','" . mysql_real_escape_string($this->getfecha(),$dblink) . "');";
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

	public function setnombre($nombre='')
	{
		$this->nombre = $nombre;
		return true;
	}

	public function getnombre()
	{
		return $this->nombre;
	}

	public function setprecio($precio='')
	{
		$this->precio = $precio;
		return true;
	}

	public function getprecio()
	{
		return $this->precio;
	}

	public function setstock($stock='')
	{
		$this->stock = $stock;
		return true;
	}

	public function getstock()
	{
		return $this->stock;
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

	public function setfecha($fecha='')
	{
		$this->fecha = $fecha;
		return true;
	}

	public function getfecha()
	{
		return $this->fecha;
	}

} // END class productos