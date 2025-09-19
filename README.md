(Autor: Diana Carolina Gomez Gonzalez)
Prueba Técnica PHP – CRUD de Empleados 

Este proyecto es una aplicación web sencilla para la gestión de empleados, desarrollada con el framework Laravel.
Implementa un CRUD completo (Crear, Leer, Actualizar y Eliminar), con formularios que incluyen distintos tipos de campos y validaciones tanto en el cliente como en el servidor.


-Requisitos del sistema
Antes de ejecutar la aplicación, asegurese de contar con:
    PHP >= 8.2
    Composer
    MySQL (o cualquier gestor de BD compatible con Laravel)
    Node.js y NPM 

Instalación y configuración
1. Clonar el repositorio
     git clone https://github.com/diana-gomez1/nexura.git
2. Instalar dependencias de PHP
    composer install
3. Configurar variables de entorno: .env
    En el archivo .env,se ajusta la conexión a la base de datos
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel   # Nombre para BD
        DB_USERNAME=root          # Usuario de MySQL
        DB_PASSWORD=              # Contraseña de MySQL
4. Generar la clave de la aplicación
    php artisan key:generate

5. Crear la base de datos y los datos de prueba:
    Para versionar el esquema de la base de datos, el proyecto utiliza las migraciones de Laravel. Este comando creará todas las tablas del esquema (areas, roles, empleados, empleado_rol) y las poblará con datos iniciales, todo en un solo paso.
       php artisan migrate:fresh --seed
6. Se inicia el servidor de desarrollo:
    php artisan serve
7. Accede a la aplicación:
        Abre tu navegador y visita la siguiente URL para comenzar a usar la aplicación.
        http://127.0.0.1:8000

8. Finalmente se va a contar con una interza donde va a mostrar el listado de empleados , con los diferentes campos , y va tener opcion de crear , eliminar, modificar siendo intuitiva y amigable con el usuario.

Con los pasos anteriores se puede llevar a cabo completamente con la ejecucion de la aplicacion.
