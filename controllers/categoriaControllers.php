<?php
require_once 'models/categoria.php';

class categoriaControllers
{
    public function index()
    {
        $categoria = new categoria();
        $categorias = $categoria->getAllCategorias();

        require_once 'views/categoria/index.php';
    }
}
