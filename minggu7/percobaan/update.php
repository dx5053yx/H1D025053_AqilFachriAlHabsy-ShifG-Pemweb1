<?php
require_once __DIR__ . "/koneksi.php";

$id = filter_var($_GET["id"] ?? $_POST["id"] ?? "", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit("ID data tidak valid.");
}

$statement = $koneksi->prepare("SELECT nama, nim, program_studi FROM mahasiswa WHERE id = ?");
$statement->bind_param("i", $id);
$statement->execute();
$row = $statement->get_result()->fetch_assoc();
if (!$row) {
    http_response_code(404);
    exit("Data mahasiswa tidak ditemukan.");
}

$values = $row;
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($values as $key => $value) {
        $values[$key] = trim((string) ($_POST[$key] ?? ""));
        if ($values[$key] === "") {
            $errors[] = "Semua kolom wajib diisi.";
            break;
        }
    }

    if (!$errors) {
        $statement = $koneksi->prepare(
            "UPDATE mahasiswa SET nama = ?, nim = ?, program_studi = ? WHERE id = ?"
        );
        $statement->bind_param("sssi", $values["nama"], $values["nim"], $values["program_studi"], $id);
        $statement->execute();
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mahasiswa</title>
</head>
<body>
    <h1>Ubah Mahasiswa</h1>
    <p><a href="index.php">Kembali</a></p>
    <?php foreach ($errors as $error): ?><p role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?></p><?php endforeach; ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo (int) $id; ?>">
        <p><label>Nama<br><input name="nama" maxlength="100" required value="<?php echo htmlspecialchars($values["nama"], ENT_QUOTES, "UTF-8"); ?>"></label></p>
        <p><label>NIM<br><input name="nim" maxlength="20" required value="<?php echo htmlspecialchars($values["nim"], ENT_QUOTES, "UTF-8"); ?>"></label></p>
        <p><label>Program Studi<br><input name="program_studi" maxlength="100" required value="<?php echo htmlspecialchars($values["program_studi"], ENT_QUOTES, "UTF-8"); ?>"></label></p>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
