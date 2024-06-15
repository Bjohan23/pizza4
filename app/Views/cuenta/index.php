<main class="p-4 md:ml-64 h-auto pt-20 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <section class="py-3 sm:py-5">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <h1 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Datos de la Cuenta</h1>
                </div>
                <div class="overflow-x-auto">
                    <div class="p-6 space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                            <span class="block text-lg text-gray-900 dark:text-white"><?php echo htmlspecialchars($data['usuario']['nombre']); ?></span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
                            <span class="block text-lg text-gray-900 dark:text-white"><?php echo htmlspecialchars($data['usuario']['email']); ?></span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono:</label>
                            <span class="block text-lg text-gray-900 dark:text-white"><?php echo htmlspecialchars($data['usuario']['telefono']); ?></span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dirección:</label>
                            <span class="block text-lg text-gray-900 dark:text-white"><?php echo htmlspecialchars($data['usuario']['direccion']); ?></span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roles:</label>
                            <span class="block text-lg text-gray-900 dark:text-white"><?php echo htmlspecialchars($data['usuario']['roles']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>