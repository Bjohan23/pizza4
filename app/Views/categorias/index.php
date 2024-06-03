<h1 class="text-2xl font-bold mb-4">Categorías</h1>
<a href="/PIZZA4/public/categorias/create" class="bg-blue-500 text-white p-2 rounded">Crear Nueva Categoría</a>
<table class="table-auto w-full mt-4">
    <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($data['categorias']) && is_array($data['categorias'])) : ?>
            <?php foreach ($data['categorias'] as $categoria) : ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo $categoria['id']; ?></td>
                    <td class="border px-4 py-2"><?php echo $categoria['nombre']; ?></td>
                    <td class="border px-4 py-2">
                        <a href="/PIZZA4/public/categorias/edit/<?php echo $categoria['id']; ?>" class="text-blue-500">Editar</a> |
                        <a href="/PIZZA4/public/categorias/delete/<?php echo $categoria['id']; ?>" class="text-red-500" onclick="return confirm('¿Estás seguro de eliminar esta categoría?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3" class="text-center">No hay categorías registradas</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>