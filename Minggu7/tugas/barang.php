<?php
include("koneksi.php");

if(isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    if($id) mysqli_query($koneksi, "UPDATE barang SET nama='$nama', harga='$harga' WHERE id=$id");
    else mysqli_query($koneksi, "INSERT INTO barang(nama, harga) VALUES('$nama','$harga')");
    header("Location:barang.php");
}
if(isset($_GET['hapus'])) {
    mysqli_query($koneksi, "DELETE FROM barang WHERE id=$_GET[hapus]");
    header("Location:barang.php");
}
$edit = null;
if(isset($_GET['edit'])) $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM barang WHERE id=$_GET[edit]"));
$read = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id");
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Barang</title></head>
<body>
    <h1>Data Barang</h1>
    <a href="index.php">Index</a> | <a href="barang.php">Barang</a> | <a href="pembeli.php">Pembeli</a> | <a href="kurir.php">Kurir</a>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $edit['id'] ?? ''; ?>">
        Nama <input type="text" name="nama" value="<?php echo $edit['nama'] ?? ''; ?>">
        Harga <input type="number" name="harga" value="<?php echo $edit['harga'] ?? ''; ?>">
        <input type="submit" name="simpan" value="Simpan">
    </form>
    <table border="1">
        <tr><th>ID</th><th>Nama</th><th>Harga</th><th>Operasi</th></tr>
        <?php
        while($d = mysqli_fetch_array($read)) {
            echo "<tr><td>$d[id]</td><td>$d[nama]</td><td>$d[harga]</td>";
            echo "<td><a href='barang.php?edit=$d[id]'>Edit</a> | <a href='barang.php?hapus=$d[id]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>
</html>
