<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php

    require_once '../config/config.php';
    require_once '../app/core/App.php';
    require_once '../app/core/Controller.php';
    require_once '../app/core/Database.php';
    require_once '../app/core/Model.php';
    require_once '../app/core/Session.php';
    require_once '../app/Views/inc/links.php';
    require_once '../app/Views/inc/scripts.php';

    // Inicializar sesiones
    Session::init();

    $app = new App();
    ?>

</body>

</html>