<?php

/******************************************************************************
* Class for simpleresto.mesas
*******************************************************************************/

class mesas
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
	private $ubicacionH;

	/**
	* @var
	*/
	private $ubicacionV;

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
		$query = "SELECT * FROM mesas WHERE `id`='{$this->getid()}'";

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
		$query = "SELECT *, (select count(1) from pedidos where estado='N' and id_mesas=m.id) as estadoPedidos FROM mesas as m";

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
		$query = "UPDATE mesas SET
						`nombre` = '" . mysql_real_escape_string($this->getnombre(),$dblink) . "',
						`ubicacionH` = '" . mysql_real_escape_string($this->getubicacionH(),$dblink) . "',
						`ubicacionV` = '" . mysql_real_escape_string($this->getubicacionV(),$dblink) . "',
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
		$query ="INSERT INTO mesas (`nombre`,`ubicacionH`,`ubicacionV`,`estado`) VALUES ('" . mysql_real_escape_string($this->getnombre(),$dblink) . "','" . mysql_real_escape_string($this->getubicacionH(),$dblink) . "','" . mysql_real_escape_string($this->getubicacionV(),$dblink) . "','" . mysql_real_escape_string($this->getestado(),$dblink) . "');";
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

	public function setubicacionH($ubicacionH='')
	{
		$this->ubicacionH = $ubicacionH;
		return true;
	}

	public function getubicacionH()
	{
		return $this->ubicacionH;
	}

	public function setubicacionV($ubicacionV='')
	{
		$this->ubicacionV = $ubicacionV;
		return true;
	}

	public function getubicacionV()
	{
		return $this->ubicacionV;
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

} // END class mesas