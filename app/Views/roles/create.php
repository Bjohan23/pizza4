<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Fondo</title>
    <style>
        .form-background {
            background-image: url('https://img.freepik.com/foto-gratis/vista-superior-deliciosa-pizza-espacio-copiar_23-2150857962.jpg?size=626&ext=jpg&ga=GA1.1.672697106.1718409600&semt=ais_user');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .input-translucido {
            background-color: rgba(0, 0, 0, 0.7); /* Negro translúcido */
            color: white;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center">
    <main class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center">
        <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 px-4 mx-auto form-background">
            <h1 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-gray-300">Crear Rol</h1>
            <?php if (isset($data['error'])) : ?>
                <p class="text-red-500 mb-4"><?php echo $data['error']; ?></p>
            <?php endif; ?>
            <form action="<?php echo ROL_CREATE ?>" method="POST" class="space-y-4">
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light input-translucido">
                </div>

                <div class="text-center">
                    <input type="submit" value="Registrar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded">
                </div>
            </form>
            <a href="<?php echo ROL ?>" class="block text-center text-blue-500 hover:text-blue-700 transition-colors duration-300 mt-4">Regresar</a>
        </section>
    </main>
</body>
</html>
