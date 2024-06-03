<main class="p-4 md:ml-64 h-auto pt-20">
    <h1>Editar Rol</h1>
    <?php if (isset($data['error'])) : ?>
        <p><?php echo $data['error']; ?></p>
    <?php endif; ?>
    <form action="/PIZZA4/public/roles/edit/<?php echo $data['rol']['id']; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $data['rol']['nombre']; ?>" required>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar Cambios</button>
    </form>


</main>