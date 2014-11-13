<?php
/******************************************************************************
* Class for simpleresto.items
*******************************************************************************/

class items
{
	/**
	* @var int
	* Class Unique ID
	*/
	private $id;

	/**
	* @var int
	*/
	private $id_pedidos;

	/**
	* @var int
	*/
	private $id_productos;
        
        
        private $precio;

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
		$query = "SELECT * FROM items WHERE `id`='{$this->getid()}'";

		$result = mysql_query($query,$dblink);

		while($row = mysql_fetch_assoc($result) )
			foreach($row as $key => $value)
			{
				$column_name = str_replace('-','_',$key);
				$this->{"set$column_name"}($value);

			}
		if(is_resource($dblink)) mysql_close($dblink);
	}
        public function SelectAll($idpedido)
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
		$query = "SELECT p.*,i.precio as precioItem, i.estado as estadoItem, i.id as idBorrar,ped.id_mesas as idMesas FROM items as i inner join productos as p on p.id=i.id_productos inner join pedidos as ped on ped.id=i.id_pedidos WHERE i.id_pedidos='{$idpedido}'";

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
		$query = "UPDATE items SET
						`estado` = '" . mysql_real_escape_string($this->getestado(),$dblink) . "',
                                                `precio` = '" . mysql_real_escape_string($this->getprecio(),$dblink) . "'
						WHERE `id`='{$this->getid()}'";

		
                mysql_query($query,$dblink);

		if(is_resource($dblink)) mysql_close($dblink);
	}
        
        
        public function delete()
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
		$query = "delete from items WHERE `id`='{$this->getid()}'";

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
		$query ="INSERT INTO items (`id_pedidos`,`id_productos`,`estado`,`precio`) VALUES ('" . mysql_real_escape_string($this->getid_pedidos(),$dblink) . "','" . mysql_real_escape_string($this->getid_productos(),$dblink) . "','" . mysql_real_escape_string($this->getestado(),$dblink) . "','" . mysql_real_escape_string($this->getprecio(),$dblink) . "');";
		
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

	public function setid_pedidos($id_pedidos='')
	{
		$this->id_pedidos = $id_pedidos;
		return true;
	}

	public function getid_pedidos()
	{
		return $this->id_pedidos;
	}

	public function setid_productos($id_productos='')
	{
		$this->id_productos = $id_productos;
		return true;
	}

	public function getid_productos()
	{
		return $this->id_productos;
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
        
	public function setprecio($precio='')
	{
		$this->precio = $precio;
		return true;
	}

	public function getprecio()
	{
		return $this->precio;
	}

} // END class items