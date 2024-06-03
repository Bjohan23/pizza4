<section class="bg-white dark:bg-gray-900">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Crear Pedido</h2>
        <form action="/PIZZA4/public/pedidos/create" method="POST" class="space-y-8">
            <div>
                <label for="usuario_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Usuario:</label>
                <select name="usuario_id" id="usuario_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                    <?php foreach ($data['usuarios'] as $usuario) : ?>
                        <option value="<?php echo $usuario['id']; ?>"><?php echo $usuario['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="cliente_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cliente:</label>
                <select name="cliente_id" id="cliente_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                    <?php foreach ($data['clientes'] as $cliente) : ?>
                        <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="mesa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mesa:</label>
                <select name="mesa_id" id="mesa_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                    <?php foreach ($data['mesas'] as $mesa) : ?>
                        <option value="<?php echo $mesa['id']; ?>"><?php echo $mesa['numero']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Estado:</label>
                <input type="text" name="estado" id="estado" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
            </div>
            <div>
                <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total:</label>
                <input type="text" name="total" id="total" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
            </div>
            <div>
                <label for="productos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Productos</label>
                <?php foreach ($data['productos'] as $producto) : ?>
                    <div class="flex items-center mb-2">
                        <input type="checkbox" name="productos[<?php echo $producto['id']; ?>][id]" value="<?php echo $producto['id']; ?>" class="mr-2">
                        <label for="productos[<?php echo $producto['id']; ?>][id]" class="mr-2 text-gray-900 dark:text-gray-300"><?php echo $producto['nombre']; ?></label>
                        <input type="number" name="productos[<?php echo $producto['id']; ?>][cantidad]" min="1" placeholder="Cantidad" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                        <input type="hidden" name="productos[<?php echo $producto['id']; ?>][precio]" value="<?php echo $producto['precio']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="py-3 px-5 text-sm font-medium text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition duration-300 ease-in-out">Crear Pedido</button>

        </form>
    </div>
</section>