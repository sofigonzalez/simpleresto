<?php

/* * ****************************************************************************
 * Class for simpleresto.movimientos
 * ***************************************************************************** */

class movimientos {

    /**
     * @var int
     * Class Unique ID
     */
    private $id;

    /**
     * @var int
     */
    private $id_tipoMov;

    /**
     * @var int
     */
    private $id_pedidos;

    /**
     * @var int
     */
    private $id_caja;

    /**
     * @var
     */
    private $importe;

    /**
     * @var string
     */
    private $observacion;

    /**
     * @var int
     */
    private $fecha;

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
        $query = "SELECT * FROM movimientos WHERE `id`='{$this->getid()}'";

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
        $query = "SELECT m.*,tm.nombre as tipomov, tm.sumaResta FROM movimientos as m inner join tipoMov as tm on m.id_tipoMov=tm.id ";

        $result = mysql_query($query, $dblink);

        if (is_resource($dblink))
            mysql_close($dblink);

        return $result;
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
        $query = "UPDATE movimientos SET
						`id_tipoMov` = '" . mysql_real_escape_string($this->getid_tipoMov(), $dblink) . "',
						
						`id_caja` = '" . mysql_real_escape_string($this->getid_caja(), $dblink) . "',
						`importe` = '" . mysql_real_escape_string($this->getimporte(), $dblink) . "',
						`observacion` = '" . mysql_real_escape_string($this->getobservacion(), $dblink) . "',
						`fecha` = '" . mysql_real_escape_string($this->getfecha(), $dblink) . "'
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
        $query = "INSERT INTO movimientos (`id_tipoMov`,`id_pedidos`,`id_caja`,`importe`,`observacion`,`fecha`) VALUES ('" . mysql_real_escape_string($this->getid_tipoMov(), $dblink) . "'," . mysql_real_escape_string($this->getid_pedidos(), $dblink) . ",'" . mysql_real_escape_string($this->getid_caja(), $dblink) . "','" . mysql_real_escape_string($this->getimporte(), $dblink) . "','" . mysql_real_escape_string($this->getobservacion(), $dblink) . "','" . mysql_real_escape_string($this->getfecha(), $dblink) . "');";
        echo $query;
        mysql_query($query, $dblink);

        if (is_resource($dblink))
            mysql_close($dblink);
    }
    
    public function CreateSinIdPedido() {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "INSERT INTO movimientos (`id_tipoMov`,`id_pedidos`,`id_caja`,`importe`,`observacion`,`fecha`) VALUES ('" . mysql_real_escape_string($this->getid_tipoMov(), $dblink) . "',NULL,'" . mysql_real_escape_string($this->getid_caja(), $dblink) . "','" . mysql_real_escape_string($this->getimporte(), $dblink) . "','" . mysql_real_escape_string($this->getobservacion(), $dblink) . "','" . mysql_real_escape_string($this->getfecha(), $dblink) . "');";

        mysql_query($query, $dblink);

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

    public function setid_tipoMov($id_tipoMov = '') {
        $this->id_tipoMov = $id_tipoMov;
        return true;
    }

    public function getid_tipoMov() {
        return $this->id_tipoMov;
    }

    public function setid_pedidos($id_pedidos = '') {
        $this->id_pedidos = $id_pedidos;
        return true;
    }

    public function getid_pedidos() {
        return $this->id_pedidos;
    }

    public function setid_caja($id_caja = '') {
        $this->id_caja = $id_caja;
        return true;
    }

    public function getid_caja() {
        return $this->id_caja;
    }

    public function setimporte($importe = '') {
        $this->importe = $importe;
        return true;
    }

    public function getimporte() {
        return $this->importe;
    }

    public function setobservacion($observacion = '') {
        $this->observacion = $observacion;
        return true;
    }

    public function getobservacion() {
        return $this->observacion;
    }

    public function setfecha($fecha = '') {
        $this->fecha = $fecha;
        return true;
    }

    public function getfecha() {
        return $this->fecha;
    }

}

// END class movimientos