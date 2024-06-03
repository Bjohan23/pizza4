<!DOCTYPE html>
<html>

<head>
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="/PIZZA4/public/css/styles.css">
</head>

<body>
    <h1>Editar Usuario</h1>
    <form action="/PIZZA4/public/usuarios/edit/<?php echo $usuario['id']; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $usuario['telefono']; ?>" required><br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>" required><br>
        <input type="submit" value="Actualizar">
    </form>
</body>

</html>