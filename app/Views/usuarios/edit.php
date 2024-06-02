<?php require '../app/views/layout/header.php'; ?>
<h1>Editar Usuario</h1>
<form action="/usuarios/edit/<?php echo $data['usuario']['id']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $data['usuario']['nombre']; ?>" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $data['usuario']['email']; ?>" required>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" value="<?php echo $data['usuario']['telefono']; ?>" required>
    <label for="direccion">Dirección:</label>
    <textarea name="direccion" required><?php echo $data['usuario']['direccion']; ?></textarea>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required>
    <label for="rol_id">Rol:</label>
    <select name="rol_id" required>
        <?php foreach ($data['roles'] as $rol) : ?>
            <option value="<?php echo $rol['id']; ?>" <?php if ($data['usuario']['rol_id'] == $rol['id']) echo 'selected'; ?>><?php echo $rol['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Guardar cambios</button>
</form>
<?php require '../app/views/layout/footer.php'; ?>