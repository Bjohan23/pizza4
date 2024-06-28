<script>
    function calcularTotal() {
        let total = 0;
        document.querySelectorAll('.producto').forEach(producto => {
            const cantidad = parseFloat(producto.querySelector('.cantidad').value) || 0;
            const precio = parseFloat(producto.querySelector('.precio').dataset.precio) || 0;
            total += cantidad * precio;
        });
        document.getElementById('total').value = total.toFixed(2);
    }
    document.addEventListener('DOMContentLoaded', () => {
        // Añadir el evento de input para calcular el total en los campos de cantidad
        document.querySelectorAll('.cantidad').forEach(cantidad => {
            cantidad.addEventListener('input', calcularTotal);
        });

        // Calcular el total inicial al cargar la página
        calcularTotal();
        // Validar el formulario antes de enviarlo
        document.querySelector('form').addEventListener('submit', validarFormulario);
    });
</script>
<main class="p-4 md:ml-64 h-auto pt-20 bg-gray-100 dark:bg-gray-900 min-h-screen">
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
                    <?php if (isset($data['pedido'])) : ?>
                        <form action="/PIZZA4/public/pedidos/update/<?php echo htmlspecialchars($data['mesa_id']); ?>" method="post">
                            <input type="hidden" name="pedido_id" value="<?php echo htmlspecialchars($data['pedido']['id']); ?>">
                            <input type="hidden" name="mesa_id" value="<?php echo htmlspecialchars($data['mesa_id']); ?>">
                            <input type="hidden" name="estado" value="<?php echo htmlspecialchars($data['pedido']['estado']); ?>">
                            <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($data['pedido']['usuario_id']); ?>">

                            <div>
                                <!-- mostrar usuario  -->
                                <label for="usuario_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Usuario Id: <?php echo htmlspecialchars($data['usuario']->id); ?> <br>
                                    Usuario: <?php echo htmlspecialchars($data['usuario']->nombre); ?>
                                </label>

                                <?php if (isset($data['mesa']) && isset($data['mesa']->capacidad) && isset($data['mesa']->numero) && isset($data['mesa']->id)) : ?>
                                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <span>Mesa ID: <?php echo htmlspecialchars($data['mesa']->id); ?></span><br>
                                        <span> Piso: <?php echo htmlspecialchars($data['mesa']->nombre_piso); ?></span><br>
                                        <span>N° Mesa: <?php echo htmlspecialchars($data['mesa']->numero); ?></span>
                                        <div>Capacidad: <?php echo htmlspecialchars($data['mesa']->capacidad); ?></div>
                                        <div>ID pedido <?php echo htmlspecialchars($data['pedido']['pedido_id']); ?></div>
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
                                        <th colspan="2" class="py-2 px-4 border dark:border-gray-600 dark:text-white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['pedidos'] as $pedido) : ?>
                                        <tr class="border-b dark:border-gray-600 producto">
                                            <td class="py-2 px-4 border dark:border-gray-600 dark:text-white nombre"><?php echo htmlspecialchars($pedido['producto_nombre']); ?></td>
                                            <td class="py-2 px-4 border dark:border-gray-600 dark:text-white precio" data-precio="<?php echo htmlspecialchars($pedido['precio']); ?>">$<?php echo htmlspecialchars($pedido['precio']); ?></td>
                                            <td class="py-2 px-4 border dark:border-gray-600 dark:text-white">
                                                <form action="/PIZZA4/public/pedidos/actualizarProducto/<?php echo htmlspecialchars($pedido['pedido_id']); ?>" method="post" autocomplete="off" class="update-form">
                                                    <input type="hidden" name="pedido_id" value="<?php echo htmlspecialchars($pedido['pedido_id']); ?>">
                                                    <input type="hidden" name="producto_id" value="<?php echo htmlspecialchars($pedido['producto_id']); ?>">
                                                    <input type="number" name="cantidad" value="<?php echo htmlspecialchars($pedido['cantidad']); ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light cantidad" required>
                                                    <input type="hidden" name="precio" value="<?php echo htmlspecialchars($pedido['precio']); ?>">
                                                    <input type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 m-2 rounded " value="Actualizar">
                                                </form>
                                            </td>
                                            <td class="py-2 px-4 border dark:border-gray-600 dark:text-white"><?php echo htmlspecialchars($pedido['producto_descripcion']); ?></td>
                                            <td class="py-2 px-4 border dark:border-gray-600 dark:text-white">
                                                <a href="/PIZZA4/public/pedidos/eliminarProducto/<?php echo htmlspecialchars($pedido['pedido_id']); ?>/<?php echo htmlspecialchars($pedido['producto_id']); ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="mt-4">
                                <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total:</label>
                                <input type="text" id="total" name="total" value="0.00" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" readonly>

                            </div>
                        </form>
                        <form id="cobrar-form" class="mt-4">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['pedido']['id']); ?>">
                            <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($data['pedido']['usuario_id']); ?>">
                            <input type="hidden" name="cliente_id" value="<?php echo htmlspecialchars($data['pedido']['cliente_id']); ?>">
                            <input type="hidden" name="mesa_id" value="<?php echo htmlspecialchars($data['pedido']['mesa_id']); ?>">
                            <input type="hidden" name="fecha" value="<?php echo htmlspecialchars($data['pedido']['fecha']); ?>">
                            <input type="hidden" name="total" value="<?php echo htmlspecialchars($data['pedido']['total']); ?>">

                            <button type="button" id="cobrar-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cobrar Pedido</button>
                        </form>
                    <?php else : ?>
                        <p class="text-red-500">No se encontró información del pedido.</p>
                    <?php endif; ?>
                    <h2 class="text-xl font-bold mb-4 mt-6 dark:text-white">Agregar Nuevo Producto</h2>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" onclick="window.location.href='/PIZZA4/public/pedidos/create/<?php echo htmlspecialchars($data['mesa_id']); ?>'">Agregar Nuevo Producto</button>
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
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Método de Pago</label>
                    <select id="payment-method" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="efectivo">Efectivo</option>
                        <option value="yape">Yape</option>
                        <option value="tarjeta">Tarjeta</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Cantidad con la que Paga</label>
                    <input type="number" id="payment-amount" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Monto Total</label>
                    <input type="number" id="total-amount" value="20" readonly class="mt-1 block w-full px-3 py-2 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Vuelto</label>
                    <input type="number" id="change-amount" readonly class="mt-1 block w-full px-3 py-2 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Pagar</button>
            </form>
        </div>
    </section>
</main>

<script>
    const TOKEN = <?php echo json_encode(TOKEN) ?>;

    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: false,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: true,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };

    const getAjaxByToken = async (url, token) => {
        try {
            const response = await fetch(url, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            });
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return await response.json();
        } catch (error) {
            toastr.error("Error en la consulta", "Error");
        }
    };

    $("#btn-search").on("click", async () => {
        const dni = $("#dni").val();
        if (!dni || dni.length !== 8) {
            return toastr.warning("Ingrese un número de DNI válido", "Advertencia");
        }

        const response = await getAjaxByToken(`http://apiconsultas.lyracorp.pro/api/dni/${dni}`, TOKEN);
        if (response && response.data) {
            const data = response.data;
            $("#nombre").val(data.nombre_completo);
        } else {
            toastr.error("No se encontraron datos para el DNI ingresado", "Error");
        }
    });

    $("#cobrar-button").on("click", function() {
        $("#form-pago").toggleClass("hidden");
    });

    $("#btn-search-client").on("click", async () => {
        const query = $("#search-client").val();
        if (!query) {
            return toastr.warning("Ingrese un valor de búsqueda", "Advertencia");
        }

        // Reemplaza esto con tu ruta de búsqueda de clientes
        const response = await getAjaxByToken(`/PIZZA4/public/clientes/buscar?query=${query}`, TOKEN);
        if (response && response.data) {
            const data = response.data;
            $("#client-info").removeClass("hidden");
            $("#nombre").val(data.nombre_completo || `${data.nombres} ${data.apellido_paterno} ${data.apellido_materno}`);
        } else {
            toastr.error("No se encontraron datos para el cliente ingresado", "Error");
            $("#client-info").addClass("hidden");
        }
    });

    document
        .getElementById("payment-amount")
        .addEventListener("input", calculateChange);
    document
        .getElementById("total-amount")
        .addEventListener("input", calculateChange);

    function calculateChange() {
        const paymentAmount =
            parseFloat(document.getElementById("payment-amount").value) || 0;
        const totalAmount =
            parseFloat(document.getElementById("total-amount").value) || 0;
        const change = paymentAmount - totalAmount;
        document.getElementById("change-amount").value =
            change >= 0 ? change : 0;
    }
</script>