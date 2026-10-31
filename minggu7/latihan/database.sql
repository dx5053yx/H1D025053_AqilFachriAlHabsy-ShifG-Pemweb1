CREATE DATABASE IF NOT EXISTS modul7_latihan
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE modul7_latihan;

CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100) NOT NULL,
    konten VARCHAR(1000) NOT NULL
);

INSERT IGNORE INTO posts (id, judul, konten) VALUES
    (1, 'Belajar Pemrograman Web', 'HTML membentuk struktur halaman web.\n\nCSS mengatur tampilan agar halaman lebih mudah dibaca.'),
    (2, 'Tips Membuat Halaman Responsif', 'Gunakan viewport dan ukuran yang fleksibel.\n\nUji tampilan pada layar ponsel dan komputer.'),
    (3, 'Mengenal Basis Data', 'Basis data menyimpan informasi dalam tabel yang terstruktur.\n\nRelasi dan query membantu aplikasi mengolah data tersebut.');
