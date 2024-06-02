<?php require '../app/views/layout/header.php'; ?>
<h1>Crear Usuario</h1>
<form action="/usuarios/create" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" required>
    <label for="direccion">Dirección:</label>
    <textarea name="direccion" required></textarea>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required>
    <label for="rol_id">Rol:</label>
    <select name="rol_id" required>
        <?php foreach ($data['roles'] as $rol) : ?>
            <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Crear</button>
</form>
<?php require '../app/views/layout/footer.php'; ?>