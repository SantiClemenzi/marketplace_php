<?php

require_once 'models/pedido.php';

class pedidoControllers
{
    public function hacer()
    {
        require_once 'views/pedido/hacerPedido.php';
    }
    public function add()
    {
        // var_dump($_POST);
        if (isset($_SESSION['identify'])) {
            // guardar datos db
            $usuario_id = $_SESSION['identify']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = utils::stateCarrito();
            $coste = $stats['total'];

            // var_dump($stats);
            // ejecutamos consulta
            if ($provincia && $localidad && $direccion) {
                $pedido = new pedido();
                $pedido->setUsuarios_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();
                if ($save) {
                    $_SESSION['pedido'] = 'complete';
                    echo $_SESSION['pedido'];
                } else {
                    $_SESSION['pedido'] = 'failed';
                    echo $_SESSION['pedido'];
                }

                $pedido->save_linea();
            }
        } else {
            // redirect to inicio
            header('Location: http://localhost/projects/master_PHP/marketplace/');
        }
        header('Location: http://localhost/projects/master_PHP/marketplace/pedidoControllers/confirmado');
    }
    public function confirmado()
    {
        if(isset($_SESSION['identity'])){
			$identity = $_SESSION['identity'];
			$pedido = new Pedido();
			$pedido->setUsuarios_id($identity->id);
			
			$pedido = $pedido->getOneByUser();
			
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->getProductosByPedido($pedido->id);
		}
        require_once 'views/pedido/confirmado.php';
    }
}
