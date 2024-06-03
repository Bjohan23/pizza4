<main class="p-4 md:ml-64 h-auto pt-20">
    <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 p-4 mb-4">
        <h1 class="text-2xl font-bold mb-4">Mesas</h1>
        <a href="/PIZZA4/public/mesas/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Crear Mesa</a>
        <table class="w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">Número</th>
                    <th class="px-4 py-2">Capacidad</th>
                    <th class="px-4 py-2">Piso</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['mesas'] as $mesa) : ?>
                    <tr class="bg-white hover:bg-gray-100">
                        <td class="border px-4 py-2"><?php echo $mesa['numero']; ?></td>
                        <td class="border px-4 py-2"><?php echo $mesa['capacidad']; ?></td>
                        <td class="border px-4 py-2"><?php echo $mesa['piso']; ?></td>
                        <td class="border px-4 py-2">
                            <a href="/PIZZA4/public/mesas/edit/<?php echo $mesa['id']; ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                            <a href="/PIZZA4/public/mesas/delete/<?php echo $mesa['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta mesa?');" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>