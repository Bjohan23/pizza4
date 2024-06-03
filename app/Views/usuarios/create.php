<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Crear Usuario</h1>
    <?php if (isset($data['error'])) : ?>
        <p class="text-red-500 mb-4"><?php echo $data['error']; ?></p>
    <?php endif; ?>
    <form action="/PIZZA4/public/usuarios/create" method="POST" class="space-y-4">
        <div>
            <label for="nombre" class="block text-gray-700 font-semibold">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="email" class="block text-gray-700 font-semibold">Email:</label>
            <input type="email" name="email" id="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="telefono" class="block text-gray-700 font-semibold">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="direccion" class="block text-gray-700 font-semibold">Dirección:</label>
            <input type="text" name="direccion" id="direccion" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="contraseña" class="block text-gray-700 font-semibold">Contraseña:</label>
            <input type="password" name="contraseña" id="contraseña" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label for="rol_id" class="block text-gray-700 font-semibold">Rol:</label>
            <select name="rol_id" id="rol_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php foreach ($data['roles'] as $rol) : ?>
                    <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-300">Crear Usuario</button>
    </form>
    <!-- boton para regregar -->
    <a href="/PIZZA4/public/usuarios" class="block text-center text-blue-500 hover:text-blue-700 transition-colors duration-300 mt-4">Regresar</a>
</div>