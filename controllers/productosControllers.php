<?php
require_once 'models/producto.php';

class productosControllers{
    public function index(){
        require_once 'views/producto/destacado.php';
    }
    public function gestion(){
        utils::isAdmin();

        $producto = new producto;
        $productos = $producto->getAll();

        require_once('views/producto/gestion.php');

    }
}