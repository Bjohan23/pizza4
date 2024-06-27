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
    <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 p-4">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Registrar Pedido</h1>
        <?php if (isset($error)) : ?>
            <p class="text-red-500"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/PIZZA4/public/pedidos/create/<?php echo $data['mesa_id']; ?>" method="post">
            <div class="mb-4">
                <label for="cliente_id" class="block text-sm font-medium text-gray-900 dark:text-white">Cliente:</label>
                <select id="cliente_id" name="cliente_id" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light cantidad">
                    <?php foreach ($data['clientes'] as $cliente) : ?>
                        <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="filtro" class="block text-sm font-medium text-gray-900 dark:text-white">Buscar Productos:</label>
                <input type="text" id="filtro" name="filtro" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light cantidad">
            </div>
            <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php foreach ($data['productos'] as $producto) : ?>
                    <div class="producto border-2 border-gray-300 rounded-lg dark:border-gray-600 p-4">
                        <p class="nombre font-medium text-lg text-gray-900 dark:text-white"><?php echo $producto['nombre']; ?></p>
                        <p class="categoria text-sm text-gray-800 dark:text-white"><?php echo $producto['categoria']; ?></p>
                        <p class="precio text-sm text-gray-500" data-precio="<?php echo $producto['precio']; ?>">Precio: <?php echo $producto['precio']; ?></p>
                        <input type="number" name="productos[<?php echo $producto['id']; ?>][cantidad]" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light cantidad" placeholder="Cantidad">
                        <input type="hidden" name="productos[<?php echo $producto['id']; ?>][id]" value="<?php echo $producto['id']; ?>">
                        <input type="hidden" name="productos[<?php echo $producto['id']; ?>][precio]" value="<?php echo $producto['precio']; ?>">
                        <input type="hidden" name="productos[<?php echo $producto['id']; ?>][descripcion]" value="<?php echo $producto['descripcion']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mb-4">
                <label for="total" class="block text-sm font-medium text-gray-900 dark:text-white">Total:</label>
                <input type="text" id="total" name="total" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light cantidad" readonly>
            </div>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Registrar Pedido
            </button>
        </form>
    </div>
    <?php include_once '../app/Views/inc/footer.php'; ?>
</main>
