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
    public function crear(){
        require_once 'views/categoria/crear.php';
    }
}
