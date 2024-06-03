<main class="p-4 md:ml-64 h-auto pt-20">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-gray-900">Usuarios</h1>
        <a href="<?php echo PISO_CREATE ?>" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">Nuevo Piso</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <!-- pisos -->
        <?php foreach ($data['pisos'] as $piso) : ?>
            <a href="/PIZZA4/public/mesas?piso_id=<?php echo $piso['id']; ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">🛋️</span>
                    <div>
                        <p class="text-sm text-gray-500"><?php echo $piso['nombre']; ?></p>
                        <p class="text-xl font-bold"><?php echo $piso['mesas_count']; ?> mesas</p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</main>