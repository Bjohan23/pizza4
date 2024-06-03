<main class="p-4 md:ml-64 h-auto pt-20">
    <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 p-4">
        <h1 class="text-2xl font-bold mb-4">Registrar Nueva Mesa</h1>
        <?php if (isset($error)) : ?>
            <p class="text-red-500"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/PIZZA4/public/mesas/create" method="post">
            <div class="mb-4">
                <label for="piso_id" class="block text-sm font-medium text-gray-700">Piso:</label>
                <select id="piso_id" name="piso_id" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php foreach ($data['pisos'] as $piso) : ?>
                        <option value="<?php echo $piso['id']; ?>"><?php echo $piso['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="numero" class="block text-sm font-medium text-gray-700">Número:</label>
                <input type="text" id="numero" name="numero" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="capacidad" class="block text-sm font-medium text-gray-700">Capacidad:</label>
                <input type="text" id="capacidad" name="capacidad" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <input type="submit" value="Registrar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
            </div>
        </form>
    </div>
</main>