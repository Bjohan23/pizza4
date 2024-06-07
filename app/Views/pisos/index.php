<main class="p-4 md:ml-64 h-auto pt-20 bg-gray-100 dark:bg-gray-900">
    <!-- Sección del título con icono -->
    <div class="flex justify-center">
        <div class="flex items-center mb-8">
            <img src="https://static-00.iconduck.com/assets.00/pizza-01-icon-2048x1751-sxphzhhe.png" alt="Logo Pizzeria" class="w-16 h-16 mr-4">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 transition-colors duration-300 hover:text-green-500">Pizzeria Zarelle</h1>
        </div>
    </div>
    
    <!-- Sección de los cuadros de los pisos centrados -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- pisos -->
        <?php foreach ($data['pisos'] as $piso) : ?>
            <a href="/PIZZA4/public/mesas?piso_id=<?php echo $piso['id']; ?>" class="piso-cuadro">
                <div class="contenido-cuadro bg-gray-800 p-4 rounded-lg text-white">
                    <p class="text-xl font-bold"><?php echo $piso['nombre']; ?></p>
                    <p class="text-lg"><?php echo $piso['mesas_count']; ?> mesas</p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Botón para agregar una sala nueva -->
    <div class="flex justify-center mt-8">
        <a href="<?php echo PISO_CREATE ?>" class="bg-green-500 text-white py-3 px-6 rounded-lg hover:bg-green-600 transition-colors duration-300">Agregar Sala Nueva</a>
    </div>
</main>

<style>
/* Estilo para los cuadros de los pisos */
.piso-cuadro {
    border: 2px solid #ccc;
    height: 20rem; /* Ajusta la altura según sea necesario */
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    background-size: cover;
    background-position: center;
    transition: transform 0.3s;
    border-radius: 10px;
    overflow: hidden;
    background-image: url('https://i.pinimg.com/originals/a6/ba/7f/a6ba7f7f6881e49a5f9da0c26dfc9859.jpg');
}

/* Estilo para el contenido dentro del cuadro */
.contenido-cuadro {
    text-align: center;
    padding: 1rem;
    border-radius: 8px;
    transition: background-color 0.3s;
}
/*ndjnskmdskd*/
/* Estilo para el hover del cuadro */
.piso-cuadro:hover {
    transform: scale(1.05); /* Pequeño efecto de agrandamiento */
}
</style>
