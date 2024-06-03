

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
        require_once '../app/Views/' . $view . '.php';
    }
}

?>