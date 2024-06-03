<main class="p-4 md:ml-64 h-auto pt-20">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-gray-900">Usuarios</h1>
        <a href="/PIZZA4/public/roles/create" class="bg-blue-500 text-white p-2 rounded">Crear Nuevo Rol</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">

        <h1>Roles</h1>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($data['roles']) && is_array($data['roles'])) : ?>
                    <?php foreach ($data['roles'] as $rol) : ?>
                        <tr>
                            <td><?php echo $rol['id']; ?></td>
                            <td><?php echo $rol['nombre']; ?></td>
                            <td>
                                <a href="/PIZZA4/public/roles/edit/<?php echo $rol['id']; ?>" class="text-blue-500">Editar</a> |
                                <a href="/PIZZA4/public/roles/delete/<?php echo $rol['id']; ?>" class="text-red-500" onclick="return confirm('¿Estás seguro de eliminar este rol?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-center">No hay roles registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>