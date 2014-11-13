<?php
/******************************************************************************
* Class for simpleresto.clientes
*******************************************************************************/

class clientes
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
	* @var string
	*/
	private $dni;

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

	/**
	* @var int
	*/
	private $fechaNac;

	/**
	* @var int
	*/
	private $fechaAlta;

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
		$query = "SELECT * FROM clientes WHERE `id`='{$this->getid()}'";

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
		$query = "SELECT * FROM clientes order by nombre";

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
		$query = "UPDATE clientes SET
						`nombre` = '" . mysql_real_escape_string($this->getnombre(),$dblink) . "',
						`dni` = '" . mysql_real_escape_string($this->getdni(),$dblink) . "',
						`telefono` = '" . mysql_real_escape_string($this->gettelefono(),$dblink) . "',
						`mail` = '" . mysql_real_escape_string($this->getmail(),$dblink) . "',
						`direccion` = '" . mysql_real_escape_string($this->getdireccion(),$dblink) . "',
						`fechaNac` = '" . mysql_real_escape_string($this->getfechaNac(),$dblink) . "',
						`fechaAlta` = '" . mysql_real_escape_string($this->getfechaAlta(),$dblink) . "'
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
		$query ="INSERT INTO clientes (`nombre`,`dni`,`telefono`,`mail`,`direccion`,`fechaNac`) VALUES ('" . mysql_real_escape_string($this->getnombre(),$dblink) . "','" . mysql_real_escape_string($this->getdni(),$dblink) . "','" . mysql_real_escape_string($this->gettelefono(),$dblink) . "','" . mysql_real_escape_string($this->getmail(),$dblink) . "','" . mysql_real_escape_string($this->getdireccion(),$dblink) . "','" . mysql_real_escape_string($this->getfechaNac(),$dblink) . "');";
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

	public function setdni($dni='')
	{
		$this->dni = $dni;
		return true;
	}

	public function getdni()
	{
		return $this->dni;
	}

	public function settelefono($telefono='')
	{
		$this->telefono = $telefono;
		return true;
	}

	public function gettelefono()
	{
		return $this->telefono;
	}

	public function setmail($mail='')
	{
		$this->mail = $mail;
		return true;
	}

	public function getmail()
	{
		return $this->mail;
	}

	public function setdireccion($direccion='')
	{
		$this->direccion = $direccion;
		return true;
	}

	public function getdireccion()
	{
		return $this->direccion;
	}

	public function setfechaNac($fechaNac='')
	{
		$this->fechaNac = $fechaNac;
		return true;
	}

	public function getfechaNac()
	{
		return $this->fechaNac;
	}

	public function setfechaAlta($fechaAlta='')
	{
		$this->fechaAlta = $fechaAlta;
		return true;
	}

	public function getfechaAlta()
	{
		return $this->fechaAlta;
	}

} // END class clientes