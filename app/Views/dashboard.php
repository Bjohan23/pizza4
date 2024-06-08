<div class="antialiased bg-gray-50 dark:bg-gray-900 min-h-screen">
    <!-- nav -->
    <?php include_once __DIR__ . '/inc/navbar.php'; ?>
    <!-- nav -->
    <!-- Sidebar -->
    <?php include_once __DIR__ . '/inc/sidebar.php'; ?>
    <!-- sidebar -->

    <main class="p-4 md:ml-64 h-auto pt-20">
        <!-- Título del Dashboard -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Dashboard</h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Usuarios -->
            <div class="col-lg-3 col-6">
            <div class="small-box bg-purple-400 dark:bg-purple-600 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="text-white">
                                <h3 class="text-3xl font-bold"><?php echo $data['usuariosCount']; ?></h3>
                                <p>Usuarios</p>
                            </div>
                            <div class="ml-auto">
                                <i class="ion ion-person-add text-white text-4xl"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo PISOS ?>" class="block text-white bg-purple-500 dark:bg-purple-700 text-center py-2 rounded-b-lg hover:bg-purple-600 dark:hover:bg-purple-800 transition duration-200">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Clientes -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-blue-400 dark:bg-blue-600 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="text-white">
                                <h3 class="text-3xl font-bold"><?php echo $data['clientesCount']; ?></h3>
                                <p>Clientes</p>
                            </div>
                            <div class="ml-auto">
                                <i class="ion ion-person-stalker text-white text-4xl"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo CLIENT ?>" class="block text-white bg-blue-500 dark:bg-blue-700 text-center py-2 rounded-b-lg hover:bg-blue-600 dark:hover:bg-blue-800 transition duration-200">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Pedidos -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-green-400 dark:bg-green-600 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="text-white">
                                <h3 class="text-3xl font-bold"><?php echo $data['pedidosCount']; ?></h3>
                                <p>Pedidos</p>
                            </div>
                            <div class="ml-auto">
                                <i class="ion ion-cube text-white text-4xl"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo ORDER_ALL ?>" class="block text-white bg-green-500 dark:bg-green-700 text-center py-2 rounded-b-lg hover:bg-green-600 dark:hover:bg-green-800 transition duration-200">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Productos -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-red-400 dark:bg-red-600 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="text-white">
                                <h3 class="text-3xl font-bold"><?php echo $data['productosCount']; ?></h3>
                                <p>Productos</p>
                            </div>
                            <div class="ml-auto">
                                <i class="ion ion-pizza text-white text-4xl"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo PRODUCT ?>" class="block text-white bg-red-500 dark:bg-red-700 text-center py-2 rounded-b-lg hover:bg-red-600 dark:hover:bg-red-800 transition duration-200">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

           
           <!-- Pisos -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-orange-500 dark:bg-orange-450 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="text-white">
                                <h3 class="text-3xl font-bold"><?php echo $data['pisoCount']; ?></h3>
                                <p>Pisos</p>
                            </div>
                            <div class="ml-auto">
                                <i class="ion ion-home text-white text-4xl"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo PISOS ?>" class="block text-white bg-orange-500 dark:bg-orange-700 text-center py-2 rounded-b-lg hover:bg-orange-700 dark:hover:bg-orange-900 hover:text-orange-900 dark:hover:text-orange-300 transition duration-200">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

           <!-- Mesas -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-red-500 dark:bg-red-700 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="text-white">
                                <h3 class="text-3xl font-bold"><?php echo $data['mesasCount']; ?></h3>
                                <p>Mesas</p>
                            </div>
                            <div class="ml-auto">
                                <i class="ion ion-chair text-white text-4xl"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo TABLE ?>" class="block text-white bg-red-700 dark:bg-red-700 text-center py-2 rounded-b-lg hover:bg-orange-600 dark:hover:bg-orange-800 transition duration-200">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </div>


          <!-- Categorías -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-yellow-300 dark:bg-yellow-600 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="text-white">
                                <h3 class="text-3xl font-bold"><?php echo $data['categoriasCount']; ?></h3>
                                <p>Categorías</p>
                            </div>
                            <div class="ml-auto">
                                <i class="ion ion-cube text-white text-4xl"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo CATEGORY ?>" class="block text-white bg-yellow-400 dark:bg-yellow-400 text-center py-2 rounded-b-lg hover:bg-teal-600 dark:hover:bg-teal-800 transition duration-200">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
          <!-- Roles -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-gray-300 dark:bg-gray-600 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="text-white">
                                <h3 class="text-3xl font-bold"><?php echo $data['rolesCount']; ?></h3>
                                <p>Roles</p>
                            </div>
                            <div class="ml-auto">
                                <i class="ion ion-key text-white text-4xl"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo ROL ?>" class="block text-white bg-gray-400 dark:bg-gray-700 text-center py-2 rounded-b-lg hover:bg-gray-600 dark:hover:bg-gray-800 transition duration-200">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>



        </div>

        <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-6 bg-white dark:bg-gray-800 shadow-lg"></div>
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72 bg-white dark:bg-gray-800 shadow-lg"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72 bg-white dark:bg-gray-800 shadow-lg"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72 bg-white dark:bg-gray-800 shadow-lg"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72 bg-white dark:bg-gray-800 shadow-lg"></div>
        </div>
        <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-6 bg-white dark:bg-gray-800 shadow-lg"></div>
        <div class="grid grid-cols-2 gap-6">
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72 bg-white dark:bg-gray-800 shadow-lg"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72 bg-white dark:bg-gray-800 shadow-lg"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72 bg-white dark:bg-gray-800 shadow-lg"></div>
            <div class="border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72 bg-white dark:bg-gray-800 shadow-lg"></div>
        </div>

        <?php include_once __DIR__ . '/inc/footer.php'; ?>
    </main>
</div>
