# Klinik Sehat — Sistem Informasi Klinik (CodeIgniter 4)

Aplikasi administrasi klinik dengan CodeIgniter 4, PHP, dan MySQL/MariaDB. Dibangun berdasarkan soal Unit Kompetensi J.620100.005.01 (Mengimplementasikan User Interface).

## Fitur
- Login/logout, session, password hashing, CSRF dan filter autentikasi.
- Dashboard: jumlah pasien, dokter, poli, transaksi, kunjungan bulan ini, biaya bulan ini, serta transaksi terbaru.
- CRUD Pasien, Dokter, Poli, dan Berobat; ID otomatis, pencarian, detail, edit, hapus, validasi, dropdown untuk relasi, dan konfirmasi hapus.
- Foreign key database menjaga konsistensi relasi antartabel.
- Laporan pasien, dokter per poli, poli, transaksi berobat, dan rekap biaya administrasi.
- Filter rentang tanggal, poli, dokter, pasien, kata kunci; cetak melalui browser dan ekspor CSV untuk Excel.
- UI responsif untuk desktop dan ponsel, sidebar, tabel, form, dan flash feedback.
- Migration + seeder, beserta skema SQL manual di `database/klinik_sehat.sql`.

## Persyaratan
- PHP 8.1 atau lebih baru dengan `intl`, `mbstring`, `mysqli`, `json`, dan `openssl` aktif.
- Composer 2, MySQL/MariaDB, dan Laragon atau XAMPP.

## Instalasi Windows (Laragon/XAMPP)
1. Clone repository lalu masuk ke folder proyek:
   ```bash
   git clone https://github.com/RizkiRamadhani561/ujian-pengayaan.git
   cd ujian-pengayaan
   ```
2. Pasang dependensi:
   ```bash
   composer install
   ```
3. Buat database bernama `klinik_sehat` dengan collation `utf8mb4_unicode_ci` di phpMyAdmin.
4. Salin `.env.example` menjadi `.env`, lalu sesuaikan host, nama database, user, dan password.
5. Jalankan migration dan data demo:
   ```bash
   php spark migrate
   php spark db:seed ClinicSeeder
   ```
6. Jalankan server:
   ```bash
   php spark serve
   ```
7. Buka `http://localhost:8080`.

Alternatif: import `database/klinik_sehat.sql` ke database kosong, lalu jalankan hanya `php spark db:seed ClinicSeeder` untuk mengisi contoh data dan akun demo. Pilih satu metode pembuatan struktur database; jangan menjalankan SQL manual lalu migration pada database sama karena migration akan mencoba membuat tabel yang sudah ada.

## Akun demo
- Email: `admin@klinik.test`
- Password: `Klinik123!`

Seeder menyimpan password sebagai hash. Akun ini hanya untuk latihan; ganti password sebelum dipakai pada lingkungan lain. Data contoh pasien bersifat dummy, bukan data medis nyata.

## Struktur migration

Setiap tabel memiliki migration terpisah agar urutan pembuatan skema jelas, mudah ditinjau, dan mudah diubah tanpa mencampur seluruh tabel dalam satu file:

1. `2026-10-25-000001_CreateUsersTable.php` — akun login.
2. `2026-10-25-000002_CreatePoliTable.php` — data poli.
3. `2026-10-25-000003_CreatePasienTable.php` — data pasien.
4. `2026-10-25-000004_CreateDokterTable.php` — data dokter dan relasi ke poli.
5. `2026-10-25-000005_CreateBerobatTable.php` — transaksi berobat dan relasi ke pasien serta dokter.

Code PHP, view, CSS, dan JavaScript juga telah dirapikan dengan pemisahan baris dan indentasi agar lebih mudah dibaca dan dipelajari.

## Struktur database
- `pasien`: `pasien_id`, `nama_pasien`, `tanggal_lahir`, `jenis_kelamin`, `alamat`.
- `poli`: `poli_id`, `nama_poli`.
- `dokter`: `dokter_id`, `nama_dokter`, `poli_id` (FK ke `poli`).
- `berobat`: `no_transaksi`, `pasien_id`, `tanggal_berobat`, `dokter_id`, `keluhan`, `biaya_adm` (FK ke `pasien` dan `dokter`).
- `users`: akun untuk login.

## Pengujian
Jalankan pemeriksaan sintaks lokal:
```bash
php tests/syntax-check.php
```

Runtime CI4 dan koneksi database perlu diuji setelah Composer serta ekstensi PHP yang dibutuhkan terpasang. Jangan memasukkan data pasien nyata ke demo. Untuk produksi, tambahkan role-based access control lebih rinci, audit log, backup, HTTPS, serta kebijakan retensi dan persetujuan yang sesuai.
