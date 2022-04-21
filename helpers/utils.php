<?php
class utils
{
    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header('Location: http://localhost/projects/master_PHP/marketplace');
        }else{
            return true;
        }
    }
    public static function showCategorias(){
        require_once 'models\categoria.php';

        $categoria = new categoria();
        $categorias = $categoria->getAllCategorias();
         var_dump(gettype($categorias));
         while ($cat = $categorias->fetch_object()){
             echo $cat->nombre;
             echo '</br>';
         }
        return $categorias;
    }
}
