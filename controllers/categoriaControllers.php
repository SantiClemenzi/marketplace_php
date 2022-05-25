<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

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
        header('Location: http://localhost/projects/master_PHP/marketplace/categoriaControllers/index');
    }
    public function ver()
    {

        if (isset($_GET)) {
            $categoria = new categoria();
            $categoria->setId($_GET['id']);
            $categoria = $categoria->getone();

            // obtenemos los porducto por categoria
            $producto = new producto();
            $producto->setCategorias_id($_GET['id']);
            $productos = $producto->getAllCategory();

        }

        require_once 'views/categoria/ver.php';
    }
}
