<?php
include("koneksi.php");
$read = mysqli_query($koneksi, "SELECT barang.id, barang.nama AS barang, pembeli.nama AS pembeli, kurir.nama AS kurir
    FROM barang JOIN pembeli ON barang.id = pembeli.id JOIN kurir ON barang.id = kurir.id");
?>
<!DOCTYPE html>
<html lang="en">
<head><title>COD Barang</title></head>
<body>
    <h1>Pendataan COD Barang</h1>
    <a href="index.php">Index</a> | <a href="barang.php">Barang</a> | <a href="pembeli.php">Pembeli</a> | <a href="kurir.php">Kurir</a>
    <table border="1">
        <tr><th>ID</th><th>Nama Barang</th><th>Nama Pembeli</th><th>Nama Kurir</th></tr>
        <?php
        while($d = mysqli_fetch_array($read)) {
            echo "<tr><td>$d[id]</td><td>$d[barang]</td><td>$d[pembeli]</td><td>$d[kurir]</td></tr>";
        }
        ?>
    </table>
</body>
</html>
