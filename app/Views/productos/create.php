<?php require '../app/views/layout/header.php'; ?>
<h1>Crear Producto</h1>
<form action="/productos/create" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" required>
    <label for="disponible">Disponible:</label>
    <input type="checkbox" name="disponible">
    <label for="categoria_id">Categoría:</label>
    <select name="categoria_id" required>
        <?php foreach ($data['categorias'] as $categoria) : ?>
            <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Crear</button>
</form>
<?php require '../app/views/layout/footer.php'; ?>