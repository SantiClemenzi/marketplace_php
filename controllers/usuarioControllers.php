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
            // validacion
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            // comprobamos la validacion de cada variable
            if ($nombre && $apellido && $email && $password) {
                $usuario1 = new usuario();
                $usuario1->setNombre($nombre);
                $usuario1->setApellido($apellido);
                $usuario1->setEmail($email);
                $usuario1->setPassword($password);
                $usuario1->setRol('user');

                // realizamos la query
                $save = $usuario1->save();

                // mostramos mensaje que corresponde
                if ($save) {
                    $_SESSION['register'] = 'completed';
                } else {
                    $_SESSION['register'] = 'failed';
                }
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }

        header('Location: http://localhost/projects/master_PHP/marketplace/usuarioControllers/registro');
    }

    public function login()
    {
        if (isset($_POST)) {
            // identificar usuario
            // consulta a la bd
            $usuario1 = new usuario();
            $usuario1->setEmail($_POST['email']);
            $usuario1->setPassword($_POST['password']);
            $identify = $usuario1->login();

            if ($identify && is_object($identify)) {
                $_SESSION['identify'] = $identify;

                if ($identify->role == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'identificacion fallida!!';
            }

            // cerrar sesion
        }
        header('Location: http://localhost/projects/master_PHP/marketplace');
    }
}
