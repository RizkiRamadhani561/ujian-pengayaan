# Klinik Sehat — Sistem Informasi Klinik (CodeIgniter 4)

Aplikasi administrasi klinik berbasis CodeIgniter 4, PHP, dan MySQL/MariaDB. Fitur: login/logout, dashboard, CRUD Pasien/Dokter/Poli/Berobat, relasi foreign key, pencarian, laporan, filter, cetak, ekspor CSV, migration, dan data demo.

## Instalasi Windows (Laragon/XAMPP)
1. Clone: `git clone https://github.com/RizkiRamadhani561/ujian-pengayaan.git`
2. Masuk folder repo lalu jalankan `composer install`.
3. Buat database `klinik_sehat` (utf8mb4) di phpMyAdmin.
4. Salin `.env.example` menjadi `.env` dan sesuaikan kredensial MySQL.
5. Jalankan `php spark migrate`, lalu `php spark db:seed ClinicSeeder`.
6. Jalankan `php spark serve`, kemudian buka http://localhost:8080.

Akun demo: `admin@klinik.test` / `Klinik123!`. Gunakan hanya untuk latihan; ganti password sebelum pemakaian nyata.

## Modul
- Dashboard dengan total pasien, dokter, poli, transaksi, kunjungan bulanan dan biaya bulan berjalan.
- CRUD Pasien, Dokter, Poli, Berobat; kode otomatis PS.001, DK001, POL001, TRX-0001.
- Search, form validation, dropdown relasi, detail, konfirmasi hapus, dan perlindungan FK.
- Laporan data pasien, dokter per poli, data poli, transaksi, dan rekap biaya; filter tanggal/poli/dokter/pasien, cetak browser dan ekspor CSV untuk Excel.
- CSRF, session login, password hashing, UI responsif.

Butuh PHP 8.1+ dengan intl, mbstring, mysqli, json, openssl dan Composer 2.0.14+. Folder vendor sengaja tidak di-commit. Data seeder bersifat dummy. Jangan gunakan data pasien nyata pada demo. Untuk produksi, lengkapi audit log, role management, backup, HTTPS, dan kontrol akses tambahan.
