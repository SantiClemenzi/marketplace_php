<?php
class pedido
{
    private $id;
    private $usuarios_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }


    function getId()
    {
        return $this->id;
    }

    function getUsuarios_id()
    {
        return $this->usuarios_id;
    }

    function getProvincia()
    {
        return $this->provincia;
    }

    function getLocalidad()
    {
        return $this->localidad;
    }

    function getDireccion()
    {
        return $this->direccion;
    }

    function getCoste()
    {
        return $this->coste;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getHora()
    {
        return $this->hora;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setUsuarios_id($usuarios_id)
    {
        $this->usuarios_id = $usuarios_id;
    }

    function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste)
    {
        $this->coste = $coste;
    }

    function setEstado($estado)
    {
        $this->estado = $this->db->real_escape_string($estado);
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM pedidos";
        $productos = $this->db->query($sql);

        return $productos;
    }

    //guardar pedido
    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuarios_id()}, '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    // guardar linea de pedido
    public function save_linea()
    {
        // $sql = "SELECT LAST_INSERT_ID();";
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);

        $pedido_id = $query->fetch_object()->pedido;


        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $insert = "INSERT INTO linea_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save = $this->db->query($insert);

            // var_dump($producto);
            // var_dump($insert);
            // echo $this->db->error;
            // die();
        }

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    public function getOneByUser()
    {
        $sql = "SELECT p.id, p.coste FROM pedidos p "
            //. "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
            . "WHERE p.usuarios_id = {$this->getUsuarios_id()} ORDER BY id DESC LIMIT 1";

        $pedido = $this->db->query($sql);

        return $pedido->fetch_object();
    }
    
	public function getProductosByPedido($id)
	{
		//		$sql = "SELECT * FROM productos WHERE id IN "
		//				. "(SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id})";

		$sql = "SELECT pr.*, lp.unidades FROM productos pr "
			. "INNER JOIN lineas_pedidos lp ON pr.id = lp.productos_id "
			. "WHERE lp.pedidos_id={$id}";

		$productos = $this->db->query($sql);

		return $productos;
	}
    // editar pedido
    // public function getOne()
    // {
    //     $sql = "SELECT * FROM pedidos WHERE id = {$this->getId()}";
    //     $producto = $this->db->query($sql);
    //     return $producto->fetch_object();
    // }
}
