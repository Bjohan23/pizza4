<h1>Registrar Sede</h1>
<?php if (isset($data['error'])) : ?>
    <p><?php echo $data['error']; ?></p>
<?php endif; ?>
<form action="<?php echo FORM_URL ?>/sede/registro" method="POST">
    <label for="nombre">
        Nombre:
        <input type="text" name="nombre" required>
    </label>
    <label for="direccion">
        Dirección:
        <input type="text" name="direccion" required>
    </label>
    <button type="submit">Registrar Sede</button>
</form>