<main class="p-4 md:ml-64 h-auto pt-20 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h1 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-gray-300">Editar Usuario</h1>
            <?php if (isset($data['error'])) : ?>
                <p class="text-red-500 mb-4"><?php echo $data['error']; ?></p>
            <?php endif; ?>
            <form action="<?= USER_EDIT?><?php echo isset($data['usuario']['id']) ? $data['usuario']['id'] : ''; ?>" method="post" class="space-y-4">

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">DNI</label>
                    <div class="flex">
                        <input type="text" id="dni" name="dni" required value="<?php echo isset($data['usuario']['dni']) ? $data['usuario']['dni'] : ''; ?>" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                        <button type="button" id="btn-search" class="ml-2 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 flex items-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo isset($data['usuario']['nombre']) ? $data['usuario']['nombre'] : ''; ?>" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($data['usuario']['email']) ? $data['usuario']['email'] : ''; ?>" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo isset($data['usuario']['telefono']) ? $data['usuario']['telefono'] : ''; ?>" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo isset($data['usuario']['direccion']) ? $data['usuario']['direccion'] : ''; ?>" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="contrasena" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contrasena (dejar en blanco si no se desea cambiar):</label>
                    <input type="password" name="contrasena" id="contrasena" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                </div>
                <div>
                    <label for="rol_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rol:</label>
                    <select name="rol_id" id="rol_id" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                        <?php foreach ($data['roles'] as $rol) : ?>
                            <option value="<?php echo $rol['id']; ?>" <?php echo ($rol['id'] == $data['usuario']['rol_id']) ? 'selected' : ''; ?>><?php echo $rol['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Actualizar</button>
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
</script>