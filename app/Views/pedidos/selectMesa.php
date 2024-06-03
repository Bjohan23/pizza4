<main class="p-4 md:ml-64 h-auto pt-20">
    <h1 class="text-2xl font-bold mb-4">Seleccionar Mesa</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <?php foreach ($data['mesas'] as $mesa) : ?>
            <div class="border-2 <?php echo $mesa['estado'] == 'ocupada' ? 'border-red-500 bg-red-100' : 'border-green-500 bg-green-100'; ?> rounded-lg h-32 md:h-64 flex flex-col justify-between p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <a href="/PIZZA4/public/pedidos/create/<?php echo $mesa['id']; ?>" class="flex items-center w-full">
                    <span class="text-4xl mr-4">🍽️</span>
                    <div>
                        <p class="text-sm text-gray-500">Mesa <?php echo $mesa['numero']; ?></p>
                        <p class="text-xl font-bold"><?php echo $mesa['estado'] == 'ocupada' ? 'Ocupada' : 'Libre'; ?></p>
                    </div>
                </a>
                <?php if ($mesa['estado'] == 'ocupada') : ?>
                    <a href="/PIZZA4/public/pedidos/viewMesa/<?php echo $mesa['id']; ?>" class="mt-4 flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        Ver Pedido
                    </a>
                    <form action=" <?= LIBERAR_MESA . $mesa['id']; ?>" method="post">
                        <button type="submit" class="mt-4 flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none dark:focus:ring-red-800">
                            Liberar Mesa
                        </button>
                    </form>

                <?php endif; ?>



            </div>
        <?php endforeach; ?>
    </div>
</main>