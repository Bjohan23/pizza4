
<h1>Productos</h1>
<a href="/productos/create">Crear Producto</a>
<table>
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Disponible</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($data['productos'] as $producto) : ?>
        <tr>
            <td><?php echo $producto['nombre']; ?></td>
            <td><?php echo $producto['descripcion']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td><?php echo $producto['disponible'] ? 'Sí' : 'No'; ?></td>
            <td><?php echo $producto['categoria']; ?></td>
            <td>
                <a href="/productos/edit/<?php echo $producto['id']; ?>">Editar</a>
                <a href="/productos/delete/<?php echo $producto['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
