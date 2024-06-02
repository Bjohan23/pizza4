<?php require '../app/views/layout/header.php'; ?>
<h1>Pedidos</h1>
<a href="/pedidos/create">Crear Pedido</a>
<table>
    <tr>
        <th>Usuario</th>
        <th>Cliente</th>
        <th>Mesa</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Total</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($data['pedidos'] as $pedido) : ?>
        <tr>
            <td><?php echo $pedido['usuario']; ?></td>
            <td><?php echo $pedido['cliente']; ?></td>
            <td><?php echo $pedido['mesa']; ?></td>
            <td><?php echo $pedido['fecha']; ?></td>
            <td><?php echo $pedido['estado']; ?></td>
            <td><?php echo $pedido['total']; ?></td>
            <td>
                <a href="/pedidos/edit/<?php echo $pedido['id']; ?>">Editar</a>
                <a href="/pedidos/delete/<?php echo $pedido['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este pedido?');">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require '../app/views/layout/footer.php'; ?>