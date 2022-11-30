
1. php 8.1.2
2. Laragon
3. Web broswer
4. mysql-8.0.30-winx64

cara install
1. clone project di terminal
2. masukkan perintah "composer install" atau "composer update"
3. kemudian copy file .env.example paste dan rename menjadi .env
4. konfigurasi database pada project
5. Jalankan"php artisan key:generate" dan "php artisan config:clear"
6. jalankan migrasi agar tabel bisa sesuai dengan run berikut "php artisan migrate" and "php artisan db:seed"
7. jalankan "php artisan serve"
8. buka http://127.0.0.1:8000
