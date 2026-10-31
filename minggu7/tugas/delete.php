<?php
require_once __DIR__ . "/common.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    header("Allow: POST");
    exit("Metode tidak diizinkan.");
}

$entity = (string) ($_POST["entity"] ?? "");
$definition = entity_definition($entity);
$id = filter_var($_POST["id"] ?? "", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit("ID data tidak valid.");
}

$statement = $koneksi->prepare("DELETE FROM {$definition['table']} WHERE id = ?");
$statement->bind_param("i", $id);
$statement->execute();

header("Location: " . $definition["page"]);
exit;