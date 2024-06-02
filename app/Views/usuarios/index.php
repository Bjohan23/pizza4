<?php require '../app/views/layout/header.php'; ?>
<h1>Usuarios</h1>
<a href="/usuarios/create">Crear Usuario</a>
<table>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($data['usuarios'] as $usuario) : ?>
        <tr>
            <td><?php echo $usuario['nombre']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo $usuario['rol']; ?></td>
            <td>
                <a href="/usuarios/edit/<?php echo $usuario['id']; ?>">Editar</a>
                <a href="/usuarios/delete/<?php echo $usuario['id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require '../app/views/layout/footer.php'; ?>