# Sistema de Gestión para Pizzería

Este proyecto es un sistema de gestión para una pizzería, desarrollado en PHP utilizando el patrón de diseño MVC (Modelo-Vista-Controlador). El sistema permite la gestión de usuarios, roles, productos, pedidos, y más.

## Requisitos

- PHP >= 7.4
- MySQL
- Composer

## Instalación

1. Clonar el repositorio:

```bash
[git clone https://github.com/tu-usuario/pizza4.git](https://github.com/Bjohan23/pizza4.git)
cd pizza4
```

2. Instalar dependencias con Composer:
 ```bash
   composer install
   ```
3.Configurar el archivo config.php con las credenciales de tu base de datos:
````bash
DB_HOST=localhost
DB_USER=tu_usuario
DB_PASS=tu_contraseña
DB_NAME=pizza4

````
4. Importar la base de datos:
````
CREATE DATABASE pizza4;
USE pizza4;
````
 Insertar el código SQL proporcionado anteriormente para crear las tablas y registrar un usuario administrador
 
4. crear archivo .env y agregar token de api de consultas reniec 
````
TOKEN= 'ingresar token de api'
````




