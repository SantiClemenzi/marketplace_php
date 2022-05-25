<?php
require_once 'models/producto.php';

class carritoControllers
{
    public function index()
    {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
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
        if (isset($_GET['id'])) {
            $index = $_GET['id'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location:http://localhost/projects/master_PHP/marketplace/carritoControllers/index");
    }

    public function delete()
    {
        unset($_SESSION['carrito']);
        header('Location: http://localhost/projects/master_PHP/marketplace/carritoControllers/index');
    }

    public function up()
    {
        if (isset($_GET['id'])) {
            $index = $_GET['id'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header("Location:http://localhost/projects/master_PHP/marketplace/carritoControllers/index");
    }

    public function down()
    {
        if (isset($_GET['id'])) {
            $index = $_GET['id'];
            $_SESSION['carrito'][$index]['unidades']--;
            if ($_SESSION['carrito'][$index]['unidades'] == 0) {
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("Location:http://localhost/projects/master_PHP/marketplace/carritoControllers/index");
    }
}
