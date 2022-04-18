<?php
require_once 'autoload.php';


// comando para hacer funcionar los controladores
// ?controller=categoriaControllers&action=index


if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'];
}else{
    echo 'La pagina que buscas NO existe';
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }else{
        echo '<h2>La pagina que buscas NO existe</h2>';
    }
}else{
    echo '<h2>La pagina que buscas NO existe</h2>';
}

?>

