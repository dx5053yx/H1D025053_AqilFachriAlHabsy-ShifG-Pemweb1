<?php
require_once __DIR__ . "/koneksi.php";

$errors = [];
$values = ["nama" => "", "nim" => "", "program_studi" => ""];
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
            "INSERT INTO mahasiswa (nama, nim, program_studi) VALUES (?, ?, ?)"
        );
        $statement->bind_param("sss", $values["nama"], $values["nim"], $values["program_studi"]);
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
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <p><a href="index.php">Kembali</a></p>
    <?php foreach ($errors as $error): ?><p role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?></p><?php endforeach; ?>
    <form method="post">
        <p><label>Nama<br><input name="nama" maxlength="100" required value="<?php echo htmlspecialchars($values["nama"], ENT_QUOTES, "UTF-8"); ?>"></label></p>
        <p><label>NIM<br><input name="nim" maxlength="20" required value="<?php echo htmlspecialchars($values["nim"], ENT_QUOTES, "UTF-8"); ?>"></label></p>
        <p><label>Program Studi<br><input name="program_studi" maxlength="100" required value="<?php echo htmlspecialchars($values["program_studi"], ENT_QUOTES, "UTF-8"); ?>"></label></p>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
