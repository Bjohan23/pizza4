<script>
    function calcularTotal() {
        let total = 0;
        document.querySelectorAll('.producto').forEach(producto => {
            const cantidad = producto.querySelector('.cantidad').value;
            const precio = producto.querySelector('.precio').dataset.precio;
            total += cantidad * precio;
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

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.cantidad').forEach(cantidad => {
            cantidad.addEventListener('input', calcularTotal);
        });
        document.getElementById('filtro').addEventListener('input', buscarProductos);
    });
</script>

<main class="p-4 md:ml-64 h-auto pt-20">
    <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <h1 class="text-2xl font-bold mb-4">Pedidos de la Mesa</h1>
                </div>
                <div class="px-4 py-3">
                    <?php if (isset($error)) : ?>
                        <p class="text-red-500"><?php echo $error; ?></p>
                    <?php endif; ?>

                    <h2 class="text-xl font-bold mb-4">Pedidos Existentes</h2>
                    <table class="min-w-full bg-white border dark:bg-gray-800">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="py-2 px-4 border dark:border-gray-600">Producto</th>
                                <th class="py-2 px-4 border dark:border-gray-600">Cantidad</th>
                                <th class="py-2 px-4 border dark:border-gray-600">Precio</th>
                                <th class="py-2 px-4 border dark:border-gray-600">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['pedidos'] as $pedido) : ?>
                                <tr class="border-b dark:border-gray-600">
                                    <td class="py-2 px-4 border dark:border-gray-600"><?php echo $pedido['producto_nombre']; ?></td>
                                    <td class="py-2 px-4 border dark:border-gray-600"><?php echo $pedido['cantidad']; ?></td>
                                    <td class="py-2 px-4 border dark:border-gray-600">$<?php echo $pedido['precio']; ?></td>
                                    <td class="py-2 px-4 border dark:border-gray-600"><?php echo $pedido['producto_descripcion']; ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                    <h2 class="text-xl font-bold mb-4 mt-6">Agregar o Editar Productos</h2>
                    <form action="/PIZZA4/public/pedidos/create/<?php echo $data['mesa_id']; ?>" method="post">
                        <div class="mb-4">
                            <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente:</label>
                            <select id="cliente_id" name="cliente_id" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <?php foreach ($data['clientes'] as $cliente) : ?>
                                    <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="filtro" class="block text-sm font-medium text-gray-700">Buscar Producto:</label>
                            <input type="text" id="filtro" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Productos:</label>
                            <?php foreach ($data['productos'] as $producto) : ?>
                                <div class="producto mb-2">
                                    <div class="flex items-center">
                                        <span class="nombre mr-2"><?php echo $producto['nombre']; ?></span>
                                        <span class="categoria hidden"><?php echo $producto['categoria']; ?></span>
                                        <input type="number" name="productos[<?php echo $producto['id']; ?>][cantidad]" value="1" min="1" class="cantidad mt-1 block w-20 px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm mr-2">
                                        <span class="precio" data-precio="<?php echo $producto['precio']; ?>">$<?php echo $producto['precio']; ?></span>
                                    </div>
                                    <input type="text" name="productos[<?php echo $producto['id']; ?>][descripcion]" placeholder="Descripción (opcional)" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <input type="hidden" name="productos[<?php echo $producto['id']; ?>][id]" value="<?php echo $producto['id']; ?>">
                                    <input type="hidden" name="productos[<?php echo $producto['id']; ?>][precio]" value="<?php echo $producto['precio']; ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="mb-4">
                            <label for="total" class="block text-sm font-medium text-gray-700">Total:</label>
                            <input type="number" id="total" name="total" readonly class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <input type="submit" value="Registrar" class="bg-primary-700 hover:bg-primary-800 text-white font-bold py-2 px-4 rounded cursor-pointer">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</main>