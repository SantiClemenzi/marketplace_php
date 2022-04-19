<?php
require_once('models/usuario.php');

class usuarioControllers{
    public function index(){
        echo 'Controlador usuario funcion publica index()';
    }

    public function registro(){
        require_once'views/usuario/registro.php';
    }

    public function save(){
        if(isset($_POST)){
            $usuario = new usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellido']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            var_dump($usuario);

            $save = $usuario->save();
            if($save){
                echo 'REGISTRO COMPLETADO';
            }
            else{
                echo 'REGISTRO FALLIDO';
            }
        }
    }
}