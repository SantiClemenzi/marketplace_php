<?php
require_once 'models/categoria.php';

class categoriaControllers
{
    public function index()
    {
        // comprobamos que el admin sea true
        utils::isAdmin();
        $categoria = new categoria();
        $categorias = $categoria->getAllCategorias();

        require_once 'views/categoria/index.php';
    }
    public function crear()
    {
        // comprobamos que el admin sea true
        utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    public function save()
    {
        // comprobamos que el admin sea true
        utils::isAdmin();
        if (isset($_POST) && $_POST['nombre']) {
            // guardar categoria en db
            $categoria = new categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }

        // redireccionamos
        header('Location : http://localhost/projects/master_PHP/marketplace/categoriaControllers/index');
    }
}
