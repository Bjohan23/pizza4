<main class="p-4 md:ml-64 h-auto pt-20">
    <h1 class="text-2xl font-bold mb-4  text-gray-900 dark:text-white">Seleccionar Piso</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <?php foreach ($data['pisos'] as $piso) : ?>
            <a href="/PIZZA4/public/pedidos/selectMesa/<?php echo $piso['id']; ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 text-gray-900 dark:text-white">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">🛋️</span>
                    <div>
                        <p class="text-sm text-gray-500 text-gray-900 dark:text-white"><?php echo $piso['nombre']; ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</main>