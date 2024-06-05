<script>
    function calcularTotal() {
        let total = 0;
        document.querySelectorAll('.producto').forEach(producto => {
            const cantidad = producto.querySelector('.cantidad').value;
            if (cantidad > 0) {
                const precio = producto.querySelector('.precio').dataset.precio;
                total += cantidad * precio;
            }
        });
        document.getElementById('total').value = total;
    }

    function buscarProductos() {
        const filtro = document.getElementById('filtro').value.toLowerCase();
        document.querySelectorAll('.producto').forEach(producto => {
            const nombre = producto.querySelector('.nombre').textContent.toLowerCase();
            const precio = producto.querySelector('.precio').dataset.precio.toLowerCase();
            const categoria = producto.querySelector('.categoria').textContent.toLowerCase();
            if (nombre.includes(filtro) || precio.includes(filtro) || categoria.includes(filtro)) {
                producto.style.display = '';
            } else {
                producto.style.display = 'none';
            }
        });
    }

    function validarFormulario(event) {
        const productosSeleccionados = document.querySelectorAll('.producto .cantidad');
        let alMenosUnProductoSeleccionado = false;

        productosSeleccionados.forEach(producto => {
            if (producto.value > 0) {
                alMenosUnProductoSeleccionado = true;
            }
        });

        if (!alMenosUnProductoSeleccionado) {
            event.preventDefault();
            alert('Seleccione al menos un producto.');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.cantidad').forEach(cantidad => {
            cantidad.addEventListener('input', calcularTotal);
        });
        document.getElementById('filtro').addEventListener('input', buscarProductos);
        document.querySelector('form').addEventListener('submit', validarFormulario);
    });
</script>
<main class="p-4 md:ml-64 h-auto pt-20">
    <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <h1 class="text-2xl font-bold mb-4 dark:text-white">Pedidos de la Mesa </h1>
                </div>
                <div class="px-4 py-3">
                    <?php if (isset($error)) : ?>
                        <p class="text-red-500"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <h2 class="text-xl font-bold mb-4 dark:text-white">Pedidos Existentes</h2>
                    <form action="/PIZZA4/public/pedidos/update/<?php echo htmlspecialchars($data['mesa_id']); ?>" method="post">
                        <input type="hidden" name="pedido_id" value="<?php echo htmlspecialchars($pedido['id']); ?>">
                        <div>
                            <label for="mesa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Mesa: -> <?php echo htmlspecialchars($data['mesa_id']); ?>
                            </label>

                            <?php if (isset($data['mesa']) && isset($data['mesa']->capacidad) && isset($data['mesa']->numero) && isset($data['mesa']->id)) : ?>
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <?php echo htmlspecialchars($data['mesa']->nombre_piso) . ' - ' . htmlspecialchars($data['mesa']->numero); ?>
                                    <span class="text-gray-500 ml-2">(ID: <?php echo htmlspecialchars($data['mesa']->id); ?>)</span>
                                    <div>Capacidad: <?php echo htmlspecialchars($data['mesa']->capacidad); ?></div>
                                </div>
                            <?php else : ?>
                                <div class="text-red-500">No se encontró información de la mesa.</div>
                            <?php endif; ?>
                        </div>

                        <div class="mt-4 p-1">
                            <label for="cliente_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cliente:</label>
                            <select name="cliente_id" id="cliente_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                                <?php foreach ($data['clientes'] as $cliente) : ?>
                                    <option value="<?php echo htmlspecialchars($cliente['id']); ?>"><?php echo htmlspecialchars($cliente['nombre']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table class="min-w-full bg-white border dark:bg-gray-800">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th class="py-2 px-4 border dark:border-gray-600 dark:text-white">Producto</th>
                                    <th class="py-2 px-4 border dark:border-gray-600 dark:text-white">Cantidad</th>
                                    <th class="py-2 px-4 border dark:border-gray-600 dark:text-white">Precio</th>
                                    <th class="py-2 px-4 border dark:border-gray-600 dark:text-white">Descripción</th>
                                    <th class="py-2 px-4 border dark:border-gray-600 dark:text-white">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['pedidos'] as $pedido) : ?>
                                    <tr class="border-b dark:border-gray-600">
                                        <td class="py-2 px-4 border dark:border-gray-600 dark:text-white"><?php echo htmlspecialchars($pedido['producto_nombre']); ?></td>
                                        <td class="py-2 px-4 border dark:border-gray-600 dark:text-white">
                                            <input type="number" name="productos[<?php echo htmlspecialchars($pedido['producto_id']); ?>][cantidad]" value="<?php echo htmlspecialchars($pedido['cantidad']); ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light cantidad" required>
                                        </td>
                                        <td class="py-2 px-4 border dark:border-gray-600 dark:text-white precio" data-precio="<?php echo htmlspecialchars($pedido['precio']); ?>">$<?php echo htmlspecialchars($pedido['precio']); ?></td>
                                        <td class="py-2 px-4 border dark:border-gray-600 dark:text-white"><?php echo htmlspecialchars($pedido['producto_descripcion']); ?></td>
                                        <td class="py-2 px-4 border dark:border-gray-600 dark:text-white">
                                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="eliminarProducto(<?php echo htmlspecialchars($pedido['producto_id']); ?>)">Eliminar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Actualizar Pedido</button>
                        </div>
                    </form>
                    <h2 class="text-xl font-bold mb-4 mt-6 dark:text-white">Agregar Nuevo Producto</h2>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" onclick="window.location.href='/PIZZA4/public/pedidos/create/<?php echo htmlspecialchars($data['mesa_id']); ?>'">Agregar Nuevo Producto</button>
                </div>
            </div>
        </div>
    </section>
</main>