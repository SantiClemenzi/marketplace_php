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

            if (isset($_FILES['imagen'])) {
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }

                    $producto->setImagen($filename);
                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                }
            }

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

    public function editar()
    {
        var_dump($_GET['id']);
    }

    public function eliminar()
    {
        var_dump($_GET);
    }
}
