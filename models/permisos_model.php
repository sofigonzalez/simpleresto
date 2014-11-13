<?php

/******************************************************************************
* Class for simpleresto.permisos
*******************************************************************************/

class permisos
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
	private $id_roles;

	/**
	* @var int
	*/
	private $id_usuarios_alta;

	/**
	* @var int
	*/
	private $fecha;

	public function __construct($id='')
	{
		$this->setid($id);
		$this->Load();
	}
public function validar()
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
		$query = "SELECT * FROM permisos WHERE `id_usuarios`='{$this->getid_usuarios()}' and `id_roles`='{$this->getid_roles()}'";

		$result = mysql_query($query,$dblink);

		while($row = mysql_fetch_assoc($result) )
			foreach($row as $key => $value)
			{
				$column_name = str_replace('-','_',$key);
				$this->{"set$column_name"}($value);

			}
		if(is_resource($dblink)) mysql_close($dblink);
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
		$query = "SELECT * FROM permisos WHERE `id`='{$this->getid()}'";

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
		$query = "UPDATE permisos SET
						`id_usuarios` = '" . mysql_real_escape_string($this->getid_usuarios(),$dblink) . "',
						`id_roles` = '" . mysql_real_escape_string($this->getid_roles(),$dblink) . "',
						`id_usuarios_alta` = '" . mysql_real_escape_string($this->getid_usuarios_alta(),$dblink) . "',
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
		$query ="INSERT INTO permisos (`id_usuarios`,`id_roles`,`id_usuarios_alta`,`fecha`) VALUES ('" . mysql_real_escape_string($this->getid_usuarios(),$dblink) . "','" . mysql_real_escape_string($this->getid_roles(),$dblink) . "','" . mysql_real_escape_string($this->getid_usuarios_alta(),$dblink) . "','" . mysql_real_escape_string($this->getfecha(),$dblink) . "');";
		mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}
	
	public function Delete()
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
		$query ="DELETE FROM permisos WHERE `id_usuarios`=" . mysql_real_escape_string($this->getid_usuarios(),$dblink) . " AND `id_roles`=" . mysql_real_escape_string($this->getid_roles(),$dblink) . ";";		
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

	public function setid_roles($id_roles='')
	{
		$this->id_roles = $id_roles;
		return true;
	}

	public function getid_roles()
	{
		return $this->id_roles;
	}

	public function setid_usuarios_alta($id_usuarios_alta='')
	{
		$this->id_usuarios_alta = $id_usuarios_alta;
		return true;
	}

	public function getid_usuarios_alta()
	{
		return $this->id_usuarios_alta;
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

} // END class permisos