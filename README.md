# Laravel 10 - Rental Mobil
<!-- 
## Screenshots

![preview img](/preview.png) -->

## Donwload

yang harus di install :
 * PHP 8.1.25
 * Composer version 2.8.6
 * composer require yajra/laravel-oci8:^10.0 // untuk oracle
 *buka file php.ini (lokasinya bisa dicek dengan php --ini)
 cari dan rubah ;extension=oci8
Hapus tanda ; di depannya sehingga menjadi: extension=oci8
Jika tidak ada, tambahkan:
extension=oci8
extension=pdo_oci
Simpan dan tutup file.


Clone Projek

```bash
  git clone https://github.com/khandavaa/RentalCar.git nama_projek
```

Masuk ke folder dengan perintah

```bash
  cd nama_projek
```

-   Copy .env.example menjadi .env kemudia edit databasenya

```bash
    composer install
```

<!-- ```bash
    php artisan key:generate
```

```bash
    php artisan artisan migrate:fresh --seed
```

```bash
    php artisan storage:link
``` -->

<!-- #### Login

-   email = admin@admin.com
-   password = 123 -->
