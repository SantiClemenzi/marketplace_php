<?php
require_once 'autoload.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';
require_once 'config/db.php';
require_once 'config/parameters.php';

// mostramos mensaje Error
function showErrors(){
    $error = new error404Controllers();
    $error->index();
}
// definimos la db

// comando para hacer funcionar los controladores
// ?controller=categoriaControllers&action=index


if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'];
}elseif(!isset($_GET['controller'])){
    $nombre_controlador = controller_default;
}else{
    showErrors();
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['action'])){
        $default = action_default;
        $controlador->$default();
    }else{
        showErrors();
    }
}else{
    showErrors();
}

require_once 'views/layout/footer.php';
