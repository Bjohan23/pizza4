<main class="p-4 md:ml-64 h-auto pt-20 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h1 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-gray-300">Crear Usuario</h1>
            <?php if (isset($data['error'])) : ?>
                <p class="text-red-500 mb-4"><?php echo $data['error']; ?></p>
            <?php endif; ?>
            <form action="/PIZZA4/public/usuarios/create" method="POST" class="space-y-4">
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email:</label>
                    <input type="email" name="email" id="email" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="contrasena" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contrasena:</label>
                    <input type="password" name="contrasena" id="contrasena" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="rol_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rol:</label>
                    <select name="rol_id" id="rol_id" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                        <?php foreach ($data['roles'] as $rol) : ?>
                            <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Crear Usuario</button>
            </form>
            <a href="/PIZZA4/public/usuarios" class="block text-center text-blue-500 hover:text-blue-700 transition-colors duration-300 mt-4">Regresar</a>
        </div>
    </section>
</main>
<?php include_once '../app/Views/inc/footer.php'; ?>


<style>
    /* Estilos para el formulario */
    form {
        max-width: 500px;
        margin: 0 auto;
    }

    /* Estilos para los campos de entrada */
    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        font-size: 14px;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    select:focus {
        outline: none;
        border-color: #2563eb;
    }

    /* Estilos para el botón */
    button[type="submit"] {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        background-color: #2563eb;
        border: none;
        border-radius: 0.375rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #1e4bb4;
    }

    /* Estilos para el enlace de regresar */
    a {
        display: block;
        text-align: center;
        color: #2563eb;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #1e4bb4;
    }
</style>