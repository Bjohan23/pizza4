<main class="p-4 md:ml-64 h-auto pt-20">
    <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 p-8">
        <h1 class="text-2xl font-bold mb-6">Registrar Nuevo Cliente</h1>
        <?php if (isset($error)) : ?>
            <p class="text-red-500 mb-6"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="<?php echo CLIENT_CREATE ?>" method="post" class="space-y-6">
            <div>
                <label for="nombre" class="block font-bold mb-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required class="border border-gray-300 rounded-md px-4 py-3 w-full">
            </div>
            <div>
                <label for="email" class="block font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" required class="border border-gray-300 rounded-md px-4 py-3 w-full">
            </div>
            <div>
                <label for="telefono" class="block font-bold mb-2">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required class="border border-gray-300 rounded-md px-4 py-3 w-full">
            </div>
            <div>
                <label for="direccion" class="block font-bold mb-2">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required class="border border-gray-300 rounded-md px-4 py-3 w-full">
            </div>
            <div class="text-right">
                <input type="submit" value="Registrar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded">
            </div>
        </form>
    </div>
</main>
</div>