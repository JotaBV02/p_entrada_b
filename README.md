## INSTALACIÓN DEL PROYECTO

Primero clonar el proyecto en /c/xampp/htdocs/

git clone https://github.com/JotaBV02/p_entrada_b.git

Una vez clonado el proyecto, ingresar

cd p_entrada_b

Luego 

composer install
cp .env.example .env
php artisan key:generate

Abrir el PhpMyAdmin, crear tu base de datos y colocar en el .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= Nombre de la BD
DB_USERNAME=root
DB_PASSWORD=

Configurar si es necesario de acuerdo a tu entorno

Luego

php artisan migrate --seed
php artisan serve

Verificar si se migró correctamente

http://127.0.0.1:8000/api/products

O el url que te brinde al ejecutar
