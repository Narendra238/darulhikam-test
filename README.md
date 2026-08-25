# Darul Hikam - Test IT Support

Aplikasi web berbasis Laravel untuk mengelola data Yayasan dan Sekolah. Dibuat menggunakan framework Laravel, Filament untuk antarmuka admin, dan PostgreSQL sebagai basis data.

**Author:** Muhammad Narendra Hawari
**Repository:** https://github.com/Narendra238/darulhikam-test.git

## Persyaratan Sistem
*   PHP ^8.2
*   Composer
*   PostgreSQL
*   Node.js & npm (opsional untuk asset, namun disarankan) [Studi kasus ini tidak menggunakan npm]

## Langkah-langkah Setup (Setup Instructions)

1.  **Clone Repository**
    Buka terminal dan jalankan perintah berikut untuk mengunduh kode dari GitHub:
    ```bash
    git clone https://github.com/Narendra238/darulhikam-test.git
    cd darulhikam-test
    ```

2.  **Install Dependencies**
    Jalankan perintah Composer untuk menginstal semua library PHP yang dibutuhkan, termasuk Filament:
    ```bash
    composer install
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` dan ubah namanya menjadi `.env`:
    ```bash
    cp .env.example .env
    ```
    Setelah disalin, hasilkan *application key* Laravel:
    ```bash
    php artisan key:generate
    ```

4.  **Konfigurasi Database**
    Buka file `.env` di teks editor Anda. Cari bagian konfigurasi database dan sesuaikan dengan pengaturan PostgreSQL lokal Anda. Pastikan Anda telah membuat database kosong bernama `darul_hikam_db` (atau nama lain pilihan Anda) di PostgreSQL.
    ```env
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=darul_hikam_db[Bebas aja mau pake apa aja nama database]
    DB_USERNAME=postgres
    DB_PASSWORD=password_postgres_anda
    ```

5.  **Jalankan Migrasi dan Seeder**
    Langkah ini akan membuat tabel-tabel di database (berdasarkan skema migrasi) dan mengisi data awal (termasuk akun administrator default). Jalankan perintah berikut:
    ```bash
    php artisan migrate --seed
    ```

6.  **Jalankan Server Lokal**
    Mulai server pengembangan Laravel:
    ```bash
    php artisan serve
    ```

7.  **Akses Aplikasi**
    Buka web browser dan akses halaman admin Filament melalui URL:
    `http://localhost:8000/admin`

## Kredensial Default (Seeder)

Anda dapat menggunakan akun berikut untuk masuk ke dashboard admin:

*   **Email:** admin@darulhikam.com
*   **Password:** password123

## Fitur Aplikasi

*   **Autentikasi:** Sistem login dan logout dasar yang disediakan oleh Filament.
*   **CRUD Yayasan:** Menambah, membaca, memperbarui, dan menghapus data Yayasan (Nama, Alamat, Telepon, Email, Website).
*   **CRUD Sekolah:** Menambah, membaca, memperbarui, dan menghapus data Sekolah yang bernaung di bawah Yayasan.
*   **Validasi:** Semua *field* input diwajibkan (required) sebelum data dapat disimpan.
*   **User Experience (UX):** Form jenjang sekolah menggunakan *dropdown* (selectbox), dan sistem akan mengarahkan pengguna kembali ke halaman daftar (tabel) secara otomatis setelah data disimpan.

## ERD (Entity Relationship Diagram)

Sistem menggunakan konsep relasi **One-to-Many**, di mana satu Yayasan dapat memiliki banyak Sekolah, tetapi satu Sekolah hanya terikat pada satu Yayasan.

```text
[Users]
- id (PK)
- name
- email
- password
- created_at
- updated_at

[Yayasans]
- id (PK)
- nama_yayasan
- alamat
- telepon
- email
- website
- created_at
- updated_at

[Sekolahs]
- id (PK)
- yayasan_id (FK -> Yayasans.id)
- nama_sekolah
- alamat
- telepon
- email
- jenjang (Day Care, TK, SD, SMP, SMA)
- created_at
- updated_at
```