<main class="p-4 md:ml-64 h-auto pt-20 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <h1 class="text-2xl font-bold mb-4 dark:text-white">Pedidos Existentes en la Mesa </h1>
                </div>
                <div class="px-4 py-3">
                    <?php if (isset($error)) : ?>
                        <p class="text-red-500"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <?php if (isset($data['pedido'])) : ?>
                        <div>
                            <label for="usuario_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Usuario: <?php echo htmlspecialchars($data['usuario']->nombre); ?>
                            </label>
                            <?php if (isset($data['mesa']) && isset($data['mesa']->capacidad) && isset($data['mesa']->numero) && isset($data['mesa']->id)) : ?>
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 m-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <span> Piso: <?php echo htmlspecialchars($data['mesa']->nombre_piso); ?></span> -
                                    <span>N° Mesa: <?php echo htmlspecialchars($data['mesa']->numero); ?></span> -
                                    <span>Capacidad: <?php echo htmlspecialchars($data['mesa']->capacidad); ?></span>
                                </div>
                            <?php else : ?>
                                <div class="text-red-500">No se encontró información de la mesa.</div>
                            <?php endif; ?>
                        </div>

                        <table class="min-w-full bg-white border dark:bg-gray-800">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th class="py-2 px-4 border dark:border-gray-600 dark:text-white">Producto</th>
                                    <th class="py-2 px-4 border dark:border-gray-600 dark:text-white">Precio</th>
                                    <th class="py-2 px-4 border dark:border-gray-600 dark:text-white">Cantidad</th>
                                    <th class="py-2 px-4 border dark:border-gray-600 dark:text-white">Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['pedidos'] as $pedido) : ?>
                                    <tr class="border-b dark:border-gray-600 producto">
                                        <td class="py-2 px-4 border dark:border-gray-600 dark:text-white nombre"><?php echo htmlspecialchars($pedido['producto_nombre']); ?></td>
                                        <td class="py-2 px-4 border dark:border-gray-600 dark:text-white precio" data-precio="<?php echo htmlspecialchars($pedido['precio']); ?>">$<?php echo htmlspecialchars($pedido['precio']); ?></td>
                                        <td class="py-2 px-4 border dark:border-gray-600 dark:text-white"><?php echo htmlspecialchars($pedido['cantidad']); ?></td>
                                        <td class="py-2 px-4 border dark:border-gray-600 dark:text-white"><?php echo htmlspecialchars($pedido['producto_descripcion']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <div class="mt-3  m-2">
                            <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total:</label>
                            <p class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"><?php echo $pedido['total']; ?></p>
                        </div>
                        <button type="button" id="cobrar-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cobrar Pedido</button>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" onclick="window.location.href='/PIZZA4/public/pedidos/create/<?php echo htmlspecialchars($data['mesa_id']); ?>?cliente_id=<?php echo htmlspecialchars($data['pedido']['cliente_id']); ?>'">Agregar Nuevo Producto</button>

                    <?php else : ?>
                        <p class="text-red-500">No se encontró información del pedido.</p>
                        <br>
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='/PIZZA4/public/pedidos/create/<?php echo htmlspecialchars($data['mesa_id']); ?>'">Agregar Producto</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="form-pago" class="hidden bg-white dark:bg-gray-900">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Pago de Pedido</h2>
            <form id="paymentForm" class="space-y-8">
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Buscar Cliente</label>
                    <div class="flex">
                        <input type="text" id="search-client" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <button type="button" id="btn-search-client" class="ml-2 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 flex items-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4-4m0 0A7.5 7.5 0 1117.5 3.5 7.5 7.5 0 0121 17.5z"></path>
                            </svg>
                        </button>
                    </div>
                    <div id="client-info" class="mt-4 hidden">
                        <label class="block text-gray-700 dark:text-gray-300">Nombre y Apellido:</label>
                        <input type="text" id="nombre" name="nombre" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <button type="button" id="btn-register-client" class="mt-2 bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Registrar Cliente</button>
                    </div>
                </div>
                <div class="mt-4 p-1">
                    <label for="cliente_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cliente:</label>
                    <select name="cliente_id" id="cliente_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                        <?php foreach ($data['clientes'] as $cliente) : ?>
                            <option value="<?php echo htmlspecialchars($cliente['id']); ?>"><?php echo htmlspecialchars($cliente['nombre']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Método de Pago</label>
                    <select id="payment-method" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="efectivo">Efectivo</option>
                        <option value="yape">Yape</option>
                        <option value="tarjeta">Tarjeta</option>
                    </select>
                </div>
                <div id="payment-fields">
                    <!-- Campos de pago dinámicos se generarán aquí -->
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Pagar</button>
            </form>
        </div>
    </section>
</main>

<?php include_once '../app/Views/inc/footer.php'; ?>

<script>
    $("#cobrar-button").on("click", function() {
        $("#form-pago").toggleClass("hidden");
    });
</script>