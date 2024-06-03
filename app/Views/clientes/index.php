<h1>Clientes</h1>
<a href="/clientes/create">Crear Cliente</a>
<table>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($data['clientes'] as $cliente) : ?>
        <tr>
            <td><?php echo $cliente['nombre']; ?></td>
            <td><?php echo $cliente['email']; ?></td>
            <td><?php echo $cliente['telefono']; ?></td>
            <td><?php echo $cliente['direccion']; ?></td>
            <td>
                <a href="/clientes/edit/<?php echo $cliente['id']; ?>">Editar</a>
                <a href="/clientes/delete/<?php echo $cliente['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este cliente?');">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>