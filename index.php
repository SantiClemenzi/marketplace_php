<?php
require_once 'autoload.php';

$controlador = new  UserController();

$controladorNota = new NotaController();

// var_dump($controladorNota->listar());
?>

<h1>Bienvenido a practica MVC</h1>

<!-- para utilizar esta funcion hay que poner ?action=showAll -->
<?php

if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
    $action = $_GET['action'];
    $controlador->$action();
}else{
    echo '<h2>No existen dichas props de USER</h2>';
}
?>
<hr>

<!-- para utilizar esta funcion hay que poner ?text=listar -->
<?php
if (isset($_GET['text']) && method_exists($controladorNota, $_GET['text'])) {
    $action = $_GET['text'];
    echo $controladorNota->$action();
}else{
    echo '<h2>No existen dichas props de NOTA</h2>';
}

?>