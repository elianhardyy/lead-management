# Lead Management System

## Overview

Lead Management System adalah aplikasi berbasis Laravel untuk melacak dan mengelola data leads penjualan properti. Aplikasi ini memungkinkan pengguna untuk menambahkan leads baru, mencari leads berdasarkan produk dan sales, serta melihat data leads berdasarkan bulan.

## Fitur

-   Tambah data leads dengan informasi lengkap
-   Filter data berdasarkan bulan saat ini
-   Pencarian berdasarkan nama produk
-   Pencarian berdasarkan sales dan bulan
-   Notifikasi perubahan data

## Teknologi

-   Laravel (Framework PHP)
-   MySQL (Database)
-   Bootstrap (Frontend)

## Persyaratan Sistem

-   PHP >= 8.1
-   Composer
-   MySQL
-   Node.js & NPM

## Instalasi

### 1. Clone repository

```bash
git clone https://github.com/username/lead-management.git
cd lead-management
```

### 2. Instal dependensi

```bash
composer install
npm install
npm run dev
```

### 3. Konfigurasi lingkungan

-   Salin file `.env.example` menjadi `.env`

```bash
cp .env.example .env
```

-   Edit file `.env` untuk mengonfigurasi koneksi database:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lead_management
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Jalankan migrasi dan seeder

```bash
php artisan migrate
php artisan db:seed --class=ProdukSeeder
php artisan db:seed --class=SalesSeeder
```

### 6. Jalankan server pengembangan

```bash
php artisan serve
```

Aplikasi akan berjalan di http://localhost:8000

## Struktur Database

### Tabel `leads`

-   `id_leads` - Primary key
-   `tanggal` - Tanggal lead
-   `id_sales` - Foreign key ke tabel sales
-   `id_produk` - Foreign key ke tabel produk
-   `no_wa` - Nomor WhatsApp
-   `nama_lead` - Nama lead
-   `kota` - Kota asal
-   `id_user` - ID pengguna yang menambahkan lead

### Tabel `produk`

-   `id_produk` - Primary key
-   `nama_produk` - Nama produk properti

### Tabel `sales`

-   `id_sales` - Primary key
-   `nama_sales` - Nama sales

## Penggunaan

### Menambahkan Lead Baru

1. Klik tombol "Tambah Lead" pada halaman utama
2. Isi formulir dengan informasi yang diperlukan:
    - Tanggal
    - Sales
    - Nama Lead
    - Produk
    - No. WhatsApp
    - Kota
3. Klik "Simpan" untuk menyimpan data lead baru

### Mencari Data Lead

1. Gunakan formulir filter di halaman utama
2. Filter berdasarkan:
    - Bulan
    - Produk
    - Sales
3. Klik "Cari" untuk menampilkan hasil pencarian

## Pengembangan Lanjutan

### Menambahkan Fitur Baru

1. Membuat migration baru:

```bash
php artisan make:migration nama_migrasi
```

2. Membuat model baru:

```bash
php artisan make:model NamaModel
```

3. Membuat controller baru:

```bash
php artisan make:controller NamaController --resource
```

## Penyelesaian Masalah Umum

### Migrasi Gagal

-   Periksa koneksi database di file `.env`
-   Reset migrasi dan coba lagi:

```bash
php artisan migrate:fresh
```

### Error 500

-   Periksa log error di `storage/logs/laravel.log`
-   Pastikan semua dependensi telah diinstal:

```bash
composer install --no-dev
```

### Masalah Tampilan

-   Kompilasi ulang aset:

```bash
npm run dev
```

## Lisensi

Aplikasi ini bersifat pribadi dan hak cipta dilindungi.
