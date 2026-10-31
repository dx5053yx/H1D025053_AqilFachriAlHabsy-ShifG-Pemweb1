<?php
require_once __DIR__ . "/common.php";

$orders = $koneksi->query(
    "SELECT barang.id, barang.nama AS nama_barang, barang.harga,
            pembeli.nama AS nama_pembeli, kurir.nama AS nama_kurir
     FROM barang
     LEFT JOIN pembeli ON pembeli.id = barang.id
     LEFT JOIN kurir ON kurir.id = barang.id
     ORDER BY barang.id"
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan COD Barang</title>
</head>
<body>
    <h1>Pendataan COD Barang</h1>
    <nav>
        <a href="../index.php">Beranda Minggu 7</a> |
        <a href="barang.php">CRUD Barang</a> |
        <a href="pembeli.php">CRUD Pembeli</a> |
        <a href="kurir.php">CRUD Kurir</a>
    </nav>
    <p>Data barang, pembeli, dan kurir ditampilkan saat memiliki ID yang sama.</p>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Nama Pembeli</th>
                <th>Nama Kurir</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($order = $orders->fetch_assoc()): ?>
                <tr>
                    <td><?php echo (int) $order["id"]; ?></td>
                    <td><?php echo escape_html($order["nama_barang"]); ?></td>
                    <td>Rp <?php echo number_format((float) $order["harga"], 0, ",", "."); ?></td>
                    <td><?php echo escape_html($order["nama_pembeli"] ?? "Belum dipasangkan"); ?></td>
                    <td><?php echo escape_html($order["nama_kurir"] ?? "Belum dipasangkan"); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
