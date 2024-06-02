<h1>Editar Pedido</h1>
<form action="/pedidos/edit/<?php echo $data['pedido']['id']; ?>" method="POST">
    <label for="usuario_id">Usuario:</label>
    <select name="usuario_id" required>
        <?php foreach ($data['usuarios'] as $usuario) : ?>
            <option value="<?php echo $usuario['id']; ?>" <?php if ($data['pedido']['usuario_id'] == $usuario['id']) echo 'selected'; ?>><?php echo $usuario['nombre']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="cliente_id">Cliente:</label>
    <select name="cliente_id" required>
        <?php foreach ($data['clientes'] as $cliente) : ?>
            <option value="<?php echo $cliente['id']; ?>" <?php if ($data['pedido']['cliente_id'] == $cliente['id']) echo 'selected'; ?>><?php echo $cliente['nombre']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="mesa_id">Mesa:</label>
    <select name="mesa_id" required>
        <?php foreach ($data['mesas'] as $mesa) : ?>
            <option value="<?php echo $mesa['id']; ?>" <?php if ($data['pedido']['mesa_id'] == $mesa['id']) echo 'selected'; ?>><?php echo $mesa['numero']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="estado">Estado:</label>
    <input type="text" name="estado" value="<?php echo $data['pedido']['estado']; ?>" required>

    <label for="total">Total:</label>
    <input type="number" step="0.01" name="total" value="<?php echo $data['pedido']['total']; ?>" required>

    <h3>Productos</h3>
    <div id="productos-container">
        <?php foreach ($data['pedido']['productos'] as $index => $producto) : ?>
            <div class="producto">
                <select name="productos[<?php echo $index; ?>][id]" required>
                    <?php foreach ($data['productos'] as $prod) : ?>
                        <option value="<?php echo $prod['id']; ?>" <?php if ($producto['producto_id'] == $prod['id']) echo 'selected'; ?>><?php echo $prod['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="number" name="productos[<?php echo $index; ?>][cantidad]" value="<?php echo $producto['cantidad']; ?>" placeholder="Cantidad" required>
                <input type="number" step="0.01" name="productos[<?php echo $index; ?>][precio]" value="<?php echo $producto['precio']; ?>" placeholder="Precio" required>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" onclick="addProducto()">Agregar Producto</button>

    <button type="submit">Guardar cambios</button>
</form>

<script>
    function addProducto() {
        var container = document.getElementById('productos-container');
        var index = container.children.length;
        var div = document.createElement('div');
        div.className = 'producto';
        div.innerHTML = `
        <select name="productos[${index}][id]" required>
            <?php foreach ($data['productos'] as $producto) : ?>
                <option value="<?php echo $producto['id']; ?>"><?php echo $producto['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="productos[${index}][cantidad]" placeholder="Cantidad" required>
        <input type="number" step="0.01" name="productos[${index}][precio]" placeholder="Precio" required>
    `;
        container.appendChild(div);
    }
</script>