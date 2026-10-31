<?php
mysqli_report(MYSQLI_REPORT_OFF);

$koneksi = mysqli_connect("localhost", "root", "", "modul7_tugas");
if (!$koneksi) {
    die("Koneksi database gagal: " . htmlspecialchars(mysqli_connect_error(), ENT_QUOTES, "UTF-8"));
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_set_charset($koneksi, "utf8mb4");
