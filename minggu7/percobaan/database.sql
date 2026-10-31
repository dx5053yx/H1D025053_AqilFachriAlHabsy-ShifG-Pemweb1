CREATE DATABASE IF NOT EXISTS modul7_percobaan
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE modul7_percobaan;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL,
    program_studi VARCHAR(100) NOT NULL
);

INSERT IGNORE INTO mahasiswa (id, nama, nim, program_studi) VALUES
    (1, 'Aqil Fachri Al Habsy', 'H1D025053', 'Informatika'),
    (2, 'Mahasiswa Contoh 2', 'H1D025054', 'Informatika'),
    (3, 'Mahasiswa Contoh 3', 'H1D025055', 'Informatika');
