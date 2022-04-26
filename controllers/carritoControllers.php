<?php
require_once 'models/producto.php';

class carritoControllers
{
    public function index()
    {
        require_once 'views/carrito/ver.php';
    }
    public function add()
    {
        // comprobamos que el id este definido
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header('Location: http://localhost/projects/master_PHP/marketplace');
        }

        // comprobamos que carrito este definido 
        $counter = 0;

        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $index => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$index]['unidades']++;
                    $counter++;
                }
            }
        }
        if (!isset($_SESSION['carrito']) || $counter == 0) {
            $producto = new producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // añadir producto al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto,
                );
            }
        }
    }
    public function remove()
    {
    }
    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header('Location: http://localhost/projects/master_PHP/marketplace');
    }
}
