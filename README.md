1. Download Source Code
2. jalankan "composer install"
3. cp .env.example .env
4. Jalankan php artisan key:generate
5. Buat Database dan sambungkan pada .env
6. Tambahkan FILESYSTEM_DRIVER=public pada .env
7. jalankan php artisan migrate
8. selesai