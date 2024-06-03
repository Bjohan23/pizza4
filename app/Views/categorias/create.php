<section class="bg-white dark:bg-gray-900">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Crear Categoría</h2>
        <?php if (isset($data['error'])) : ?>
            <p class="text-red-500"><?php echo $data['error']; ?></p>
        <?php endif; ?>
        <form action="/PIZZA4/public/categorias/create" method="POST" class="space-y-8">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre de la Categoría</label>
                <input type="text" name="nombre" id="nombre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
            </div><button type="submit" class="w-full py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Categoria</button>
        </form>
        <a href="<?php echo CATEGORY ?>" class="block text-center text-blue-500 hover:text-blue-700 transition-colors duration-300 mt-4">Regresar</a>
    </div>
</section>