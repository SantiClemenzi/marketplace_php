<?php
class pedidoControllers
{
    public function hacer()
    {
        require_once 'views/pedido/hacerPedido.php';
    }
    public function add()
    {
        var_dump($_POST);
        if (isset($_POST['identify'])) {
            // guardar datos db
            
        } else {
            // redirect to inicio
            header('Location: http://localhost/projects/master_PHP/marketplace/');
        }
    }
}
