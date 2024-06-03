<main class="p-4 md:ml-64 h-auto pt-20">
    <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4">
        <h1 class="text-2xl font-bold mb-4">Clientes</h1>
        <a href="<?php echo CLIENT_CREATE  ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Crear Cliente</a>
        <table class="w-full">
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Teléfono</th>
                <th class="px-4 py-2">Dirección</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
            <?php foreach ($data['clientes'] as $cliente) : ?>
                <tr class="bg-white hover:bg-gray-100">
                    <td class="border px-4 py-2"><?php echo $cliente['nombre']; ?></td>
                    <td class="border px-4 py-2"><?php echo $cliente['email']; ?></td>
                    <td class="border px-4 py-2"><?php echo $cliente['telefono']; ?></td>
                    <td class="border px-4 py-2"><?php echo $cliente['direccion']; ?></td>
                    <td class="border px-4 py-2">
                        <a href="<?= CLIENT_EDIT . $cliente['id'] ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                        <a href="<?= CLIENT_DELETE . $cliente['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este cliente?');" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
</div>