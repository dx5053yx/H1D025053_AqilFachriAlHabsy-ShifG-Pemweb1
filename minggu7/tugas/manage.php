<?php
require_once __DIR__ . "/common.php";

$entity = (string) ($_GET["entity"] ?? "");
$definition = entity_definition($entity);
$result = $koneksi->query("SELECT * FROM {$definition['table']} ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data <?php echo escape_html($definition["label"]); ?></title>
</head>
<body>
    <h1>Data <?php echo escape_html($definition["label"]); ?></h1>
    <nav>
        <a href="../index.php">Beranda Minggu 7</a> |
        <a href="index.php">Beranda COD</a> |
        <a href="barang.php">Barang</a> |
        <a href="pembeli.php">Pembeli</a> |
        <a href="kurir.php">Kurir</a>
    </nav>
    <p><a href="create.php?entity=<?php echo rawurlencode($entity); ?>">Tambah <?php echo escape_html($definition["label"]); ?></a></p>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <?php foreach ($definition["fields"] as $field): ?><th><?php echo escape_html($field["label"]); ?></th><?php endforeach; ?>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($record = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo (int) $record["id"]; ?></td>
                    <?php foreach ($definition["fields"] as $name => $field): ?>
                        <td><?php echo escape_html($record[$name]); ?></td>
                    <?php endforeach; ?>
                    <td>
                        <a href="update.php?entity=<?php echo rawurlencode($entity); ?>&amp;id=<?php echo (int) $record["id"]; ?>">Ubah</a>
                        <form action="delete.php" method="post" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                            <input type="hidden" name="entity" value="<?php echo escape_html($entity); ?>">
                            <input type="hidden" name="id" value="<?php echo (int) $record["id"]; ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
