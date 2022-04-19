<?php
class usuario
{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // metodos para la id
    function getId($id)
    {
        return $id;
    }

    // metodos para el nombre
    function getNombre()
    {
        return $this->nombre;
    }
    function setNombre($nombre)
    {
        $this->nombre = $this->db->$nombre;
    }
    // metodos para el apellido
    function getApellido()
    {
        return $this->apellido;
    }
    function setApellido($apellido)
    {
        $this->apellido = $this->db->$apellido;
    }
    // metodos para el email
    function getEmail()
    {
        return $this->email;
    }
    function setEmail($email)
    {
        $this->email = $this->db->$email;
    }
    // metodos para el password
    function getPassword()
    {
        return $this->password;
    }
    function setPassword($password)
    {
        $this->password = password_hash($this->db->$password, PASSWORD_BCRYPT, ['cost' => 4]);
    }
    // metodos para el rol
    function getRol()
    {
        return $this->rol;
    }
    function setRol()
    {
        $this->rol = 'user';
    }
    // metodos para el imagen
    function getImagen()
    {
        return $this->imagen;
    }
    function setImagen($imagen)
    {
        $this->imagen = $this->db->real_scape_string($imagen);
    }

    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES (NULL,'{$this->getNombre}','{$this->getApellido}','{$this->getEmail}','{$this->getPassword}','{$this->getRol}','{$this->getImagen}')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }
}
