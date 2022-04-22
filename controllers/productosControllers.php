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
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
        $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
        $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
        // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

        if ($nombre && $descripcion && $precio && $stock && $categoria) {
            $producto = new Producto();
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio($precio);
            $producto->setStock($stock);
            $producto->setCategorias_id($categoria);

            $save = $producto->save();

            if ($save) {
                $_SESSION['producto'] = "complete";
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }

        header('Location: http://localhost/projects/master_PHP/marketplace/productosControllers/gestion');
    }
}
