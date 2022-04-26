<?php
require_once 'models/producto.php';

class carritoControllers
{
    public function index()
    {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) <= 1) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }
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
            $producto1 = $producto->getOne();

            // añadir producto al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto1->id,
                    "precio" => $producto1->precio,
                    "unidades" => 1,
                    "producto" => $producto1,
                );
            }
        }
        header('Location: http://localhost/projects/master_PHP/marketplace/carritoControllers/index');
    }
    public function remove()
    {
    }
    public function delete()
    {
        unset($_SESSION['carrito']);
        header('Location: http://localhost/projects/master_PHP/marketplace/carritoControllers/index');
    }
}
