<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <!-- nav -->
    <?php include_once __DIR__ . '/inc/navbar.php'; ?>
    <!-- nav -->

    <!-- Sidebar -->

    <!-- sidebar -->

    <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Usuarios -->
            <a href="<?php echo USER ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">👤</span>
                    <div>
                        <p class="text-sm text-gray-500">Usuarios</p>
                        <p class="text-xl font-bold"><?php echo $data['usuariosCount']; ?></p>
                    </div>
                </div>
            </a>
            <!-- Clientes -->
            <a href="<?php echo CLIENT ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">👥</span>
                    <div>
                        <p class="text-sm text-gray-500">Clientes</p>
                        <p class="text-xl font-bold"><?php echo $data['clientesCount']; ?></p>
                    </div>
                </div>
            </a>
            <!-- Pedidos -->
            <a href="<?php echo ORDER ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">📦</span>
                    <div>
                        <p class="text-sm text-gray-500">Pedidos</p>
                        <p class="text-xl font-bold"><?php echo $data['pedidosCount']; ?></p>
                    </div>
                </div>
            </a>
            <!-- Productos -->
            <a href="<?php echo PRODUCT ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">🍕</span>
                    <div>
                        <p class="text-sm text-gray-500">Productos</p>
                        <p class="text-xl font-bold"><?php echo $data['productosCount']; ?></p>
                    </div>
                </div>
            </a>
            <!-- pisos -->
            <a href="<?php echo PISOS ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">🏢</span>
                    <div>
                        <p class="text-sm text-gray-500">Pisos</p>
                        <p class="text-xl font-bold"><?php echo $data['sucursalesCount']; ?></p>
                    </div>
                </div>
            </a>

            <!-- mesas -->
            <a href="<?php echo TABLE ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">🪑</span>
                    <div>
                        <p class="text-sm text-gray-500">Mesas</p>
                        <p class="text-xl font-bold"><?php echo $data['mesasCount']; ?></p>
                    </div>
                </div>
            </a>
            <!-- Categorias -->
            <a href="<?php echo CATEGORY ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">📦</span>
                    <div>
                        <p class="text-sm text-gray-500">Categorías</p>
                        <p class="text-xl font-bold"><?php echo $data['categoriasCount']; ?></p>
                    </div>
                </div>
            </a>
            <!-- Roles -->
            <a href="<?php echo ROL ?>" class="border-2 border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex items-center p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                <div class="flex items-center w-full">
                    <span class="text-4xl mr-4">🔐</span>
                    <div>
                        <p class="text-sm text-gray-500">Roles</p>
                        <p class="text-xl font-bold"><?php echo $data['rolesCount']; ?></p>
                    </div>
                </div>
            </a>


        </div>


        <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">1#</div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">2#</div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>
        <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
        <div class="grid grid-cols-2 gap-4">
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>

    </main>
</div>