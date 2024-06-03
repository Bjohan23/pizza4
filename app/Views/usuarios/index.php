<main class="p-4 md:ml-64 h-auto pt-20">
    <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold text-gray-900">Usuarios</h1>
                <a href="/PIZZA4/public/usuarios/create" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">Registrar Nuevo Usuario</a>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Teléfono</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($data['usuarios']) && is_array($data['usuarios'])) : ?>
                            <?php foreach ($data['usuarios'] as $usuario) : ?>
                                <tr class="hover:bg-gray-100 transition-colors duration-300">
                                    <td class="px-4 py-2 border-b"><?php echo $usuario['id']; ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo $usuario['nombre']; ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo $usuario['email']; ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo $usuario['telefono']; ?></td>
                                    <td class="px-4 py-2 border-b">
                                        <div class="flex items-center space-x-2">
                                            <a href="/PIZZA4/public/usuarios/edit/<?php echo $usuario['id']; ?>" class="text-blue-500 hover:text-blue-700 transition-colors duration-300">Editar</a>
                                            <span>|</span>
                                            <a href="/PIZZA4/public/usuarios/delete/<?php echo $usuario['id']; ?>" class="text-red-500 hover:text-red-700 transition-colors duration-300" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center">No hay usuarios registrados</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
</div>