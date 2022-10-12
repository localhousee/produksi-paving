Aplikasi Produksi Paving menggunakan Laravel Framework

Fitur :
- CRUD untuk paving, pembeli, supplier, serta produksi paving
- Implementasi Relationship One to Many dan Many to Many
- Implementasi stok item pada paving
- Fitur Transaksi Jual dan Beli
- Implementasi Keranjang belanja (banyak jenis item dalam satu kali pembelian / penjualan)
- Pagination untuk daftar transaksi jual / beli
- Cetak report PDF penjualan maupun pembelian berdasarkan range tanggal

### Requirement
Pastikan sudah terinstall :
- NodeJS LTS version
- PHP 8.0.2^
- Composer 2.0^

### Instalasi
- Clone repository ini
- Install PHP dependencies: `composer install`
- Ubah nama file `.env.example` menjadi `.env` (atau salin saja jika ingin memiliki backup config)
- Generate key untuk aplikasi: `php artisan key:generate`
- Install Javascript dependencies: `npm install`
- Migrate DB dan insert dummy data untuk melihat gambaran dashboard (cepat tidaknya proses ini berjalan tergantung device): `php artisan migrate:fresh --seed`
  - File konfigurasi untuk proses insert dummy data berada di `database\seeders\DatabaseSeeder.php`
  - Di beberapa fungsi dengan prefix `seed` seperti `seedTransaksiJual`, terdapat local variable `$randomNumbers`. Silahkan atur angka di dalam `rand()` sesuai kebutuhan
- Jalankan app: `php artisan serve`
