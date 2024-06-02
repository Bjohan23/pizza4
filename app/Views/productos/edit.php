<?php require '../app/views/layout/header.php'; ?>
<h1>Editar Producto</h1>
<form action="/productos/edit/<?php echo $data['producto']['id']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $data['producto']['nombre']; ?>" required>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required><?php echo $data['producto']['descripcion']; ?></textarea>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" value="<?php echo $data['producto']['precio']; ?>" required>
    <label for="disponible">Disponible:</label>
    <input type="checkbox" name="disponible" <?php echo $data['producto']['disponible'] ? 'checked' : ''; ?>>
    <label for="categoria_id">Categoría:</label>
    <select name="categoria_id" required>
        <?php foreach ($data['categorias'] as $categoria) : ?>
            <option value="<?php echo $categoria['id']; ?>" <?php if ($data['producto']['categoria_id'] == $categoria['id']) echo 'selected'; ?>><?php echo $categoria['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Guardar cambios</button>
</form>
<?php require '../app/views/layout/footer.php'; ?>