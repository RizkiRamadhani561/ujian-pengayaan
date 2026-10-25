-- Klinik Sehat: MySQL / MariaDB schema
-- Import this file into the `klinik_sehat` database.
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS=0;
CREATE TABLE IF NOT EXISTS users (
 id INT UNSIGNED NOT NULL AUTO_INCREMENT, name VARCHAR(120) NOT NULL,
 email VARCHAR(190) NOT NULL, password VARCHAR(255) NOT NULL,
 role VARCHAR(30) NOT NULL DEFAULT 'admin', is_active TINYINT(1) NOT NULL DEFAULT 1,
 created_at DATETIME NULL, updated_at DATETIME NULL,
 PRIMARY KEY (id), UNIQUE KEY uq_users_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS poli (
 poli_id VARCHAR(12) NOT NULL, nama_poli VARCHAR(100) NOT NULL,
 created_at DATETIME NULL, updated_at DATETIME NULL,
 PRIMARY KEY (poli_id), UNIQUE KEY uq_poli_nama (nama_poli)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS pasien (
 pasien_id VARCHAR(12) NOT NULL, nama_pasien VARCHAR(120) NOT NULL,
 tanggal_lahir DATE NOT NULL, jenis_kelamin VARCHAR(15) NOT NULL, alamat VARCHAR(255) NOT NULL,
 created_at DATETIME NULL, updated_at DATETIME NULL,
 PRIMARY KEY (pasien_id), KEY idx_pasien_nama (nama_pasien)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS dokter (
 dokter_id VARCHAR(12) NOT NULL, nama_dokter VARCHAR(120) NOT NULL, poli_id VARCHAR(12) NOT NULL,
 created_at DATETIME NULL, updated_at DATETIME NULL,
 PRIMARY KEY (dokter_id), KEY idx_dokter_poli (poli_id),
 CONSTRAINT fk_dokter_poli FOREIGN KEY (poli_id) REFERENCES poli(poli_id) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS berobat (
 no_transaksi VARCHAR(20) NOT NULL, pasien_id VARCHAR(12) NOT NULL, tanggal_berobat DATE NOT NULL,
 dokter_id VARCHAR(12) NOT NULL, keluhan TEXT NOT NULL, biaya_adm DECIMAL(12,2) NOT NULL DEFAULT 0,
 created_at DATETIME NULL, updated_at DATETIME NULL,
 PRIMARY KEY (no_transaksi), KEY idx_berobat_pasien (pasien_id), KEY idx_berobat_dokter (dokter_id), KEY idx_berobat_tanggal (tanggal_berobat),
 CONSTRAINT fk_berobat_pasien FOREIGN KEY (pasien_id) REFERENCES pasien(pasien_id) ON UPDATE CASCADE ON DELETE RESTRICT,
 CONSTRAINT fk_berobat_dokter FOREIGN KEY (dokter_id) REFERENCES dokter(dokter_id) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SET FOREIGN_KEY_CHECKS=1;
-- Seeder creates the demo account with a password hash; do not store plain-text passwords in SQL.
