# SIM SURAT
Aplikasi Sistem Manajemen Surat Sederhana dengan laravel v5.5. System requirementsnya liat di sini yah https://laravel.com/docs/5.5/#server-requirements

# Konfigurasi
Setelah download/clone jalankan perintah berikut untuk menginstall dependency composer via command prompt/terminal etc.

```bash
cd simsurat
php composer.phar install
```

# Setup Database
Copy file .env.example dengan nama .env dan sesuaikan konfigurasi database anda. Contoh
```php
DB_DATABASE=manajemen_surat
DB_USERNAME=root
DB_PASSWORD=passwordmysql
```
Kemudian jalankan perintah berikut untuk menggenerate key
```bash
php artisan key:generate
```
# Migrasi Database
Jalankan perintah berikut untuk generate tabel
```bash
php artisan migrate --seed
```
Jalankan perintah berikut untuk serve aplikasi

```bash
php artisan serve
```
Kemudian akses http://localhost:8000 via browser kesukaan lo
Jadi deh ^_^

# Pengguna
Untuk demo login dengan menggunakan username/password admin/123456 untuk hak akses admin dan user1/123456 untuk hak akses normal

# License
This project is licensed under the MIT License - see the [License File](LICENSE) for details
