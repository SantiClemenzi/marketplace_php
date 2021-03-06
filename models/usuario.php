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
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    // metodos para el apellido
    function getApellido()
    {
        return $this->apellido;
    }
    function setApellido($apellido)
    {
        $this->apellido = $this->db->real_escape_string($apellido);
    }
    // metodos para el email
    function getEmail()
    {
        return $this->email;
    }
    function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }
    // metodos para el password
    function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }
    function setPassword($password)
    {
        $this->password = $password;
    }
    // metodos para el rol
    function getRol()
    {
        return $this->rol;
    }
    function setRol($rol)
    {
        $this->rol = $rol;
    }
    // metodos para el imagen
    function getImagen()
    {
        return $this->imagen;
    }
    function setImagen($imagen)
    {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    // creamos usuario
    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES (NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','{$this->getRol()}','{$this->getImagen()}')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    // logueamos usuario
    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        // comprobamos si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();
            // veridficamos el password
            $verify = password_verify($password, $usuario->password);
            if ($verify) {
                $result = $usuario;
            }
            return $result;
        }
    }
}
