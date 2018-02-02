# SIM SURAT
Aplikasi Sistem Manajemen Surat Sederhana dengan laravel

# Konfigurasi
Setelah download/clone jalankan perintah berikut untuk menginstall dependency composer via command prompt/terminal etc.

```bash
cd simsurat
php composer.phar install
```

# Setup Database
Copy file .env.example dengan .env dan sesuaikan konfigurasi database anda. Contoh
```php
DB_DATABASE=manajemen_surat
DB_USERNAME=root
DB_PASSWORD=passwordmysql
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

Jadi deh ^_^

# Pengguna
Untuk demo login dengan menggunakan username/password admin/123456 untuk hak akses admin dan user1/123456 untuk hak akses normal
