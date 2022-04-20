<?php
class categoria
{
    private $id;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

     function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

     function getNombre()
    {
        return $this->nombre;
    }

     function getId()
    {
        return $this->id;
    }

    public function getAllCategorias(){
        $sql = "SELECT * FROM categorias";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
}
