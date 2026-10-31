CREATE DATABASE IF NOT EXISTS modul7_tugas
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE modul7_tugas;

CREATE TABLE IF NOT EXISTS barang (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga DECIMAL(12, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS pembeli (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    alamat VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS kurir (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20) NOT NULL
);

INSERT IGNORE INTO barang (id, nama, harga) VALUES
    (1, 'Buku Pemrograman Web', 85000),
    (2, 'Keyboard', 175000),
    (3, 'Mouse', 95000);

INSERT IGNORE INTO pembeli (id, nama, no_hp, alamat) VALUES
    (1, 'Pembeli 1', '0000000001', 'Alamat contoh 1'),
    (2, 'Pembeli 2', '0000000002', 'Alamat contoh 2'),
    (3, 'Pembeli 3', '0000000003', 'Alamat contoh 3');

INSERT IGNORE INTO kurir (id, nama, no_hp) VALUES
    (1, 'Kurir 1', '0000000011'),
    (2, 'Kurir 2', '0000000012'),
    (3, 'Kurir 3', '0000000013');