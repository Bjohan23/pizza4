<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h1>
        <?php if (isset($data['error'])) : ?>
            <p class="text-red-500 mb-4 text-sm"><?php echo $data['error']; ?></p>
        <?php endif; ?>
        <form action="/auth/login" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-gray-700 font-semibold">Email:</label>
                <input type="email" name="email" id="email" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="contraseña" class="block text-gray-700 font-semibold">Contraseña:</label>
                <input type="password" name="contraseña" id="contraseña" class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition-colors">Iniciar Sesión</button>
                <a href="#" class="text-sm text-blue-500 hover:text-blue-700 transition-colors">¿Olvidaste tu contraseña?</a>
            </div>
        </form>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">