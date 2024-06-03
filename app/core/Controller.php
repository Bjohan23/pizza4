

<?php

class Controller
{
    public function model($model) // recibe el modelo que se quiere cargar 
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }


    public function view($view, $data = []) //recibe la vista y los datos que se quieren enviar a la vista 
    {
        require_once '../app/core/Session.php';
        Session::init();
        include_once '../app/Views/inc/head.php';
        if (Session::get('usuario_id')) {
            include_once '../app/Views/inc/navbar.php';
            include_once  '../app/Views/inc/sidebar.php';
        }
        require_once '../app/Views/' . $view . '.php';
        include_once '../app/Views/inc/script.php';
        include_once '../app/Views/inc/js/alertas.php';
        if (Session::get('usuario_id')) {
            // include_once '../app/Views/inc/footer.php';

        }
    }
}

?>