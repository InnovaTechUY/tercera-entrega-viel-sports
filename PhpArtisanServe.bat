cd ApiAutenticacion
php artisan key:generate
php artisan migrate
start php artisan serve --port=8000 
cd ..
cd ApiPublicidad
php artisan key:generate
start php artisan serve --port=8001
cd ..
cd ApiResultados
php artisan key:generate
start php artisan serve --port=8002
cd..
cd AppUsuario
php artisan key:generate
start php artisan serve --port=8003
cd..
cd BackOffice
php artisan key:generate
php artisan migrate
start php artisan serve --port=8004
@pause
