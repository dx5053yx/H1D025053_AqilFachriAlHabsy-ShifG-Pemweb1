<?php
require_once __DIR__ . "/koneksi.php";
$mahasiswa = $koneksi->query("SELECT id, nama, nim, program_studi FROM mahasiswa ORDER BY id DESC");

function h($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan CRUD Mahasiswa</title>
</head>
<body>
    <h1>Percobaan: Data Mahasiswa</h1>
    <p><a href="../index.php">Beranda Minggu 7</a></p>
    <p><a href="create.php">Tambah mahasiswa</a></p>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr><th>ID</th><th>Nama</th><th>NIM</th><th>Program Studi</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            <?php while ($row = $mahasiswa->fetch_assoc()): ?>
                <tr>
                    <td><?php echo (int) $row["id"]; ?></td>
                    <td><?php echo h($row["nama"]); ?></td>
                    <td><?php echo h($row["nim"]); ?></td>
                    <td><?php echo h($row["program_studi"]); ?></td>
                    <td>
                        <a href="update.php?id=<?php echo (int) $row["id"]; ?>">Ubah</a>
                        <form action="delete.php" method="post" style="display:inline" onsubmit="return confirm('Hapus data mahasiswa ini?')">
                            <input type="hidden" name="id" value="<?php echo (int) $row["id"]; ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
