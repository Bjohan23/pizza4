<!DOCTYPE html>
<html>

<head>
    <title>Usuarios</title>
    <!-- Agrega tus archivos CSS aquí -->
</head>

<body>
    <h1>Usuarios</h1>
    <a href="/PIZZA4/public/usuarios/create" class="bg-blue-500 text-white p-2 rounded">Registrar Nuevo Usuario</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['telefono']; ?></td>
                    <td>
                        <a href="/PIZZA4/public/usuarios/edit/<?php echo $usuario['id']; ?>" class="text-blue-500">Editar</a> |
                        <a href="/PIZZA4/public/usuarios/delete/<?php echo $usuario['id']; ?>" class="text-red-500" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>