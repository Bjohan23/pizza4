<main class="p-4 md:ml-64 h-auto pt-20 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <section class="py-3 sm:py-5">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <h1 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Ventas</h1>
                </div>
                <div class="overflow-x-auto">
                    <div class="p-6 space-y-6">
<<<<<<< HEAD
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Fecha</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Tipo</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Monto</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Usuario</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Cliente</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Teléfono</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Dirección</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Mesa</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Piso</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Detalles del Pedido</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <?php foreach ($data['ventas'] as $venta) : ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['fecha']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['tipo']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['monto']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['usuario_nombre']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['cliente_nombre']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['cliente_telefono']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['cliente_direccion']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['cliente_email']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['mesa_numero']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['piso_nombre']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?php echo $venta['detalles_pedido']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
=======
                        <!-- input para filtrar por fecha -->
                        <form action="/PIZZA4/public/ventas" method="POST" class="flex space-x-4">
                            <input type="date" name="fecha" id="fecha" class="w-1/4 p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php echo isset($data['fecha']) ? $data['fecha'] : ''; ?>">
                            <button type="submit" class="px-4 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg shadow-sm hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Filtrar</button>
                        </form>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Fecha</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Tipo</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Monto</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Usuario</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Cliente</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Teléfono</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Dirección</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Email</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Mesa</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Piso</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Detalles del Pedido</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                <?php if (!empty($data['ventas'])) : ?>
                                    <?php foreach ($data['ventas'] as $venta) : ?>
                                        <tr>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['fecha']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['tipo']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['monto']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['usuario_nombre']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['cliente_nombre']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['cliente_telefono']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['cliente_direccion']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['cliente_email']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['mesa_numero']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['piso_nombre']; ?></td>
                                            <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white"><?php echo $venta['detalles_pedido']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td class="py-4 px-6 text-sm text-gray-900 whitespace-nowrap dark:text-white" colspan="11">No se encontraron ventas.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        
                        <!-- Controles de paginación -->
                        <div class="flex justify-between mt-4">
                            <a href="?pagina=<?php echo max(1, $data['pagina'] - 1); ?>" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg shadow-sm hover:bg-primary-700">Anterior</a>
                            <span class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">Página <?php echo $data['pagina']; ?> de <?php echo $data['totalPaginas']; ?></span>
                            <a href="?pagina=<?php echo min($data['totalPaginas'], $data['pagina'] + 1); ?>" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg shadow-sm hover:bg-primary-700">Siguiente</a>
                        </div>
>>>>>>> 10bab11bfe709f6a0e1892c37fe9f7ef0dff901c
                    </div>
                </div>
            </div>
        </div>
    </section>
<<<<<<< HEAD
</main>
=======
</main>
>>>>>>> 10bab11bfe709f6a0e1892c37fe9f7ef0dff901c
