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
        $this->nombre = $this->db->real_escape_string($nombre);
    }
     function setId($id)
    {
        $this->id = $id;
    }

     function getNombre()
    {
        return $this->nombre;
    }

     function getId()
    {
        return $this->id;
    }

    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
		return $categoria->fetch_object();
    }

    public function getAllCategorias(){
        $sql = "SELECT * FROM categorias ";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
    public function save(){
        $sql = "INSERT INTO categorias VALUES (NULL,'{$this->getNombre()}')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true; 
        }

        return $result;
    }
}
