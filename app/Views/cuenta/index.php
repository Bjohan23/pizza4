<main class="p-4 md:ml-64 h-auto pt-20 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <div class="container mx-auto">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold mb-4">Datos de la Cuenta</h1>
                <div class="flex flex-col space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Nombre:</label>
                        <span class="block text-lg"><?php echo htmlspecialchars($data['usuario']['nombre']); ?></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Email:</label>
                        <span class="block text-lg"><?php echo htmlspecialchars($data['usuario']['email']); ?></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Teléfono:</label>
                        <span class="block text-lg"><?php echo htmlspecialchars($data['usuario']['telefono']); ?></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Dirección:</label>
                        <span class="block text-lg"><?php echo htmlspecialchars($data['usuario']['direccion']); ?></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Roles:</label>
                        <span class="block text-lg"><?php echo htmlspecialchars($data['usuario']['roles']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>