<?php
class producto
{
    private $id;
    private $categorias_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }


    function getId()
    {
        return $this->id;
    }

    function getCategorias_id()
    {
        return $this->categorias_id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getPrecio()
    {
        return $this->precio;
    }

    function getStock()
    {
        return $this->stock;
    }

    function getOferta()
    {
        return $this->oferta;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getImagen()
    {
        return $this->imagen;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setCategorias_id($categorias_id)
    {
        $this->categorias_id = $categorias_id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM productos";
        $productos = $this->db->query($sql);

        return $productos;
    }

    //guardar producto 
    public function save()
    {
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getCategorias_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    // eliminar producto
    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    // editar producto
    public function getOne()
    {
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()}";
        $producto = $this->db->query($sql);
        return $producto->fetch_object();
    }

    public function edit()
    {
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categorias_id={$this->getCategorias_id()}  ";

        if ($this->getImagen() != null) {
            $sql .= ", imagen='{$this->getImagen()}'";
        }

        $sql .= " WHERE id={$this->id};";


        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    // obtener productos
    public function getRandom($limit)
    {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    // obtener productos por categoira
    public function getAllCategory()
    {
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
            . "INNER JOIN categorias c ON c.id = p.categorias_id "
            . "WHERE p.categorias_id = {$this->getCategorias_id()} "
            . "ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }
}
