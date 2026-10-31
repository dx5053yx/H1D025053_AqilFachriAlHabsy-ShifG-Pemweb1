<?php
require_once __DIR__ . "/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    header("Allow: POST");
    exit("Metode tidak diizinkan.");
}

$id = filter_var($_POST["id"] ?? "", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit("ID data tidak valid.");
}

$statement = $koneksi->prepare("DELETE FROM mahasiswa WHERE id = ?");
$statement->bind_param("i", $id);
$statement->execute();
header("Location: index.php");
exit;
