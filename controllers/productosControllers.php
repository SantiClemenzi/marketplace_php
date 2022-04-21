<?php
require_once 'models/producto.php';

class productosControllers
{
    public function index()
    {
        require_once 'views/producto/destacado.php';
    }
    public function gestion()
    {
        utils::isAdmin();

        $producto = new producto;
        $productos = $producto->getAll();

        require_once('views/producto/gestion.php');
    }
    public function crear()
    {
        utils::isAdmin();
        require_once 'views/producto/crear.php';
    }
    public function save()
    {
        utils::isAdmin();
        if (isset($_POST)) {
            var_dump($_POST);
        }
    }
}
