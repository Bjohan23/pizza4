<section class="bg-white dark:bg-gray-900">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-900 dark:text-gray-300">Crear Usuario</h1>
        <?php if (isset($data['error'])) : ?>
            <p class="text-red-500 mb-4"><?php echo $data['error']; ?></p>
        <?php endif; ?>
        <form action="/PIZZA4/public/usuarios/create" method="POST" class="space-y-4">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email:</label>
                <input type="email" name="email" id="email" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dirección:</label>
                <input type="text" name="direccion" id="direccion" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="contraseña" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contraseña:</label>
                <input type="password" name="contraseña" id="contraseña" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="rol_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rol:</label>
                <select name="rol_id" id="rol_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <?php foreach ($data['roles'] as $rol) : ?>
                        <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="w-full py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Usuario</button>
        </form>
        <a href="/PIZZA4/public/usuarios" class="block text-center text-blue-500 hover:text-blue-700 transition-colors duration-300 mt-4">Regresar</a>
    </div>
</section>