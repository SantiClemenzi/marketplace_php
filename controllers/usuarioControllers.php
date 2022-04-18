<?php
class usuarioControllers{
    public function index(){
        echo 'Controlador usuario funcion publica index()';
    }

    public function registro(){
        require_once'views/usuario/registro.php';
    }

    public function save(){
        if(isset($_POST)){
            var_dump($_POST);
        }
    }
}