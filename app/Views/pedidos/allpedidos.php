<main class="p-4 md:ml-64 h-auto pt-20">
    <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5>
                            <span class="text-gray-500">Total Pedidos:</span>
                            <span class="dark:text-white"><?php echo count($data['pedidos']); ?></span>
                        </h5>
                    </div>
                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <a href="/PIZZA4/public/pedidos/index" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Volver a la lista de mesas
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">ID</th>
                                <th scope="col" class="px-4 py-3">Usuario</th>
                                <th scope="col" class="px-4 py-3">Cliente</th>
                                <th scope="col" class="px-4 py-3">Mesa</th>
                                <th scope="col" class="px-4 py-3">Fecha</th>
                                <th scope="col" class="px-4 py-3">Estado</th>
                                <th scope="col" class="px-4 py-3">Total</th>
                                <th scope="col" class="px-4 py-3">Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($data['pedidos']) && is_array($data['pedidos'])) : ?>
                                <?php foreach ($data['pedidos'] as $pedido) : ?>
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-4 py-3"><?php echo $pedido['id']; ?></td>
                                        <td class="px-4 py-3"><?php echo $pedido['usuario']; ?></td>
                                        <td class="px-4 py-3"><?php echo $pedido['cliente']; ?></td>
                                        <td class="px-4 py-3"><?php echo $pedido['mesa']; ?></td>
                                        <td class="px-4 py-3"><?php echo $pedido['fecha']; ?></td>
                                        <td class="px-4 py-3"><?php echo $pedido['estado']; ?></td>
                                        <td class="px-4 py-3"><?php echo $pedido['total']; ?></td>
                                        <td class="px-4 py-3">
                                            <ul>
                                                <?php foreach ($pedido['detalles'] as $detalle) : ?>
                                                    <li><?php echo $detalle['cantidad'] . ' x ' . $detalle['nombre']; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="px-4 py-3 text-center">No hay pedidos registrados</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../app/Views/inc/footer.php'; ?>
</main>