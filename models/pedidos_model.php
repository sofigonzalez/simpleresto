<?php

/* * ****************************************************************************
 * Class for simpleresto.pedidos
 * ***************************************************************************** */

class pedidos {

    /**
     * @var int
     * Class Unique ID
     */
    private $id;

    /**
     * @var int
     */
    private $id_mesas;

    /**
     * @var int
     */
    private $id_clientes;

    /**
     * @var int
     */
    private $id_usuarios;

    /**
     * @var
     */
    private $ajusteImporte;

    /**
     * @var
     */
    private $totalPagado;

    /**
     * @var string
     */
    private $observaciones;

    /**
     * @var
     */
    private $estado;

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
        $query = "SELECT * FROM pedidos WHERE `id`='{$this->getid()}'";

        $result = mysql_query($query, $dblink);

        while ($row = mysql_fetch_assoc($result))
            foreach ($row as $key => $value) {
                $column_name = str_replace('-', '_', $key);
                $this->{"set$column_name"}($value);
            }
        if (is_resource($dblink))
            mysql_close($dblink);
    }

    public function PedidoActivo($id_mesas) {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "SELECT * FROM pedidos WHERE estado= 'N' and `id_mesas`='{$id_mesas}'";

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
        $query = "SELECT * FROM pedidos ";

        $result = mysql_query($query, $dblink);

        if (is_resource($dblink))
            mysql_close($dblink);

        return $result;
    }

    public function Pendientes() {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "SELECT
            items.id as idItem,
            pedidos.fecha as Fecha,
            productos.nombre as Producto,
            mesas.nombre as Mesa,
            items.estado as Estado
            FROM pedidos
            inner join mesas on mesas.id=pedidos.id_mesas
            inner join items on items.id_pedidos=pedidos.id and items.estado='P'
            inner join productos on productos.id=items.id_productos
            order by 1,2
";

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
        $query = "UPDATE pedidos SET
						`ajusteImporte` = '" . mysql_real_escape_string($this->getajusteImporte(), $dblink) . "',
						`totalPagado` = '" . mysql_real_escape_string($this->gettotalPagado(), $dblink) . "',
						`observaciones` = '" . mysql_real_escape_string($this->getobservaciones(), $dblink) . "',
						`estado` = '" . mysql_real_escape_string($this->getestado(), $dblink) . "' 
						WHERE `id`='{$this->getid()}'";
        echo $query;
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
        $query = "INSERT INTO pedidos (`id_mesas`,`id_clientes`,`id_usuarios`,`ajusteImporte`,`totalPagado`,`observaciones`,`estado`,`fecha`) VALUES ('" . mysql_real_escape_string($this->getid_mesas(), $dblink) . "','" . mysql_real_escape_string($this->getid_clientes(), $dblink) . "','" . mysql_real_escape_string($this->getid_usuarios(), $dblink) . "','" . mysql_real_escape_string($this->getajusteImporte(), $dblink) . "','" . mysql_real_escape_string($this->gettotalPagado(), $dblink) . "','" . mysql_real_escape_string($this->getobservaciones(), $dblink) . "','" . mysql_real_escape_string($this->getestado(), $dblink) . "',now());";

        mysql_query($query, $dblink);

        if (is_resource($dblink))
            mysql_close($dblink);
    }

    public function CreateInicial() {
        $dblink = null;

        try {
            $dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS);
            mysql_select_db(DB_BASE, $dblink);
        } catch (Exception $ex) {
            echo "Could not connect to " . DB_HOST . ":" . DB_BASE . "\n";
            echo "Error: " . $ex->message;
            exit;
        }
        $query = "INSERT INTO pedidos (`id_mesas`,`id_clientes`,`observaciones`,`estado`,`fecha`) VALUES ('" . mysql_real_escape_string($this->getid_mesas(), $dblink) . "','" . mysql_real_escape_string($this->getid_clientes(), $dblink) . "','" . mysql_real_escape_string($this->getobservaciones(), $dblink) . "','" . mysql_real_escape_string($this->getestado(), $dblink) . "',now());";

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

    public function setid_mesas($id_mesas = '') {
        $this->id_mesas = $id_mesas;
        return true;
    }

    public function getid_mesas() {
        return $this->id_mesas;
    }

    public function setid_clientes($id_clientes = '') {
        $this->id_clientes = $id_clientes;
        return true;
    }

    public function getid_clientes() {
        return $this->id_clientes;
    }

    public function setid_usuarios($id_usuarios = '') {
        $this->id_usuarios = $id_usuarios;
        return true;
    }

    public function getid_usuarios() {
        return $this->id_usuarios;
    }

    public function setajusteImporte($ajusteImporte = '') {
        $this->ajusteImporte = $ajusteImporte;
        return true;
    }

    public function getajusteImporte() {
        return $this->ajusteImporte;
    }

    public function settotalPagado($totalPagado = '') {
        $this->totalPagado = $totalPagado;
        return true;
    }

    public function gettotalPagado() {
        return $this->totalPagado;
    }

    public function setobservaciones($observaciones = '') {
        $this->observaciones = $observaciones;
        return true;
    }

    public function getobservaciones() {
        return $this->observaciones;
    }

    public function setestado($estado = '') {
        $this->estado = $estado;
        return true;
    }

    public function getestado() {
        return $this->estado;
    }

    public function setfecha($fecha = '') {
        $this->fecha = $fecha;
        return true;
    }

    public function getfecha() {
        return $this->fecha;
    }

}

// END class pedidos