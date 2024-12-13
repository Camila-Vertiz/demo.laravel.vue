# Proyecto de Gestión de Tareas

Este proyecto es una aplicación para la gestión de tareas, donde los usuarios pueden crear, editar, eliminar y ver las tareas. La aplicación utiliza **Laravel** para el backend y **Vue.js** para el frontend, integrando ambos con la ayuda de Inertia.js.

## Descripción de la Arquitectura

-   **Backend**: Laravel, un framework PHP, se utiliza para manejar la lógica de negocio y la comunicación con la base de datos.
-   **Frontend**: Vue.js, un framework JavaScript, se utiliza para crear la interfaz de usuario interactiva, y Inertia.js se usa para hacer las interacciones entre el frontend y el backend más fluidas y rápidas sin recargar la página.
-   **Base de Datos**: MySQL, gestionada a través de XAMPP.

## Requisitos

Antes de comenzar, asegúrate de tener instaladas las siguientes herramientas en tu sistema:

-   **XAMPP** (para manejar el servidor Apache y MySQL):
    -   Puedes descargar XAMPP desde [https://www.apachefriends.org/es/index.html](https://www.apachefriends.org/es/index.html).
    -   XAMPP incluye PHP, MySQL, y phpMyAdmin, lo que facilita la instalación y gestión del servidor y la base de datos.
-   **PHP** >= 8.0 (incluido con XAMPP).
-   **Composer** (para la gestión de dependencias de PHP).
-   **Node.js** >= 16.x.
-   **npm** (o **Yarn**, dependiendo de tu preferencia para la gestión de dependencias de JavaScript).

## Instrucciones para Clonar e Instalar Dependencias

### 1. Clonar el Repositorio

Primero, clona este repositorio en tu máquina local:

`bash`
`git clone https://github.com/tu-usuario/gestion-tareas.git`
`cd gestion-tareas`

### 2. Instalar las Dependencias del Backend

Asegúrate de estar en la carpeta raíz del proyecto y luego instala las dependencias de Laravel utilizando Composer:

`composer install`

### 3.Configurar la Base de Datos

Abre XAMPP y enciende los servicios de Apache y MySQL.
Accede a phpMyAdmin a través de http://localhost/phpmyadmin en tu navegador.
Crea una base de datos llamada demo:
En phpMyAdmin, haz clic en "Bases de datos".
Crea una base de datos nueva con el nombre demo.

### 4. Configurar el Archivo .env

Abre el archivo .env y configura las variables de entorno para la base de datos:
`DB_CONNECTION=mysql`
`DB_HOST=127.0.0.1`
`DB_PORT=3306`
`DB_DATABASE=demo`
`DB_USERNAME=root`
`DB_PASSWORD=`

### 6. Ejecutar las Migraciones de la Base de Datos

Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

`bash`
`php artisan migrate`

### 7. Instalar las Dependencias del Frontend

Instala las dependencias del frontend utilizando npm (o Yarn si lo prefieres):

`bash`
`npm install`

### 8. Ejecutar el Proyecto

Para ejecutar tanto el backend como el frontend en desarrollo, ejecuta los siguientes comandos en dos terminales separadas:

#### Backend (Laravel)

`bash`
`php artisan serve`
Esto ejecutará el backend en http://localhost:8000.

#### Frontend (Vue.js)

`bash`
`npm run dev`
Esto ejecutará el frontend en http://localhost:3000.

## Rutas y Funcionalidades

-   GET /tasks - Muestra todas las tareas.
-   POST /tasks - Crea una nueva tarea.
-   PUT /tasks/{task} - Actualiza una tarea existente.
-   DELETE /tasks/{task} - Elimina una tarea.

El frontend interactúa con estas rutas utilizando Axios para enviar y recibir datos de manera asincrónica.
