<?php
require_once('models/usuario.php');

class usuarioControllers
{
    public function index()
    {
        echo 'Controlador usuario funcion publica index';
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $usuario1 = new usuario();
            $usuario1->setNombre($_POST['nombre']);
            $usuario1->setApellido($_POST['apellido']);
            $usuario1->setEmail($_POST['email']);
            $usuario1->setPassword($_POST['password']);
            $usuario1->setRol('user');

            var_dump($usuario1);

            $save = $usuario1->save();
            if ($save) {
                $_SESSION['register'] = 'completed';
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }

        header('Location: http://localhost/projects/master_PHP/marketplace/usuarioControllers/registro');
    }
}
