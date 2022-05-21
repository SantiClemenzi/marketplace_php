<?php
class pedidoControllers{
    public function hacer(){
        require_once 'views/pedido/hacerPedido.php';
    }
    public function add(){
        var_dump($_POST);
    }

}