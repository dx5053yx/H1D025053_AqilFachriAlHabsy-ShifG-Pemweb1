<?php
include("koneksi.php");

if(isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    if($id) mysqli_query($koneksi, "UPDATE pembeli SET nama='$nama', nomor_hp='$hp', alamat='$alamat' WHERE id=$id");
    else mysqli_query($koneksi, "INSERT INTO pembeli(nama, nomor_hp, alamat) VALUES('$nama','$hp','$alamat')");
    header("Location:pembeli.php");
}
if(isset($_GET['hapus'])) {
    mysqli_query($koneksi, "DELETE FROM pembeli WHERE id=$_GET[hapus]");
    header("Location:pembeli.php");
}
$edit = null;
if(isset($_GET['edit'])) $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pembeli WHERE id=$_GET[edit]"));
$read = mysqli_query($koneksi, "SELECT * FROM pembeli ORDER BY id");
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Pembeli</title></head>
<body>
    <h1>Data Pembeli</h1>
    <a href="index.php">Index</a> | <a href="barang.php">Barang</a> | <a href="pembeli.php">Pembeli</a> | <a href="kurir.php">Kurir</a>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $edit['id'] ?? ''; ?>">
        Nama <input type="text" name="nama" value="<?php echo $edit['nama'] ?? ''; ?>">
        No HP <input type="text" name="nomor_hp" value="<?php echo $edit['nomor_hp'] ?? ''; ?>">
        Alamat <input type="text" name="alamat" value="<?php echo $edit['alamat'] ?? ''; ?>">
        <input type="submit" name="simpan" value="Simpan">
    </form>
    <table border="1">
        <tr><th>ID</th><th>Nama</th><th>No HP</th><th>Alamat</th><th>Operasi</th></tr>
        <?php
        while($d = mysqli_fetch_array($read)) {
            echo "<tr><td>$d[id]</td><td>$d[nama]</td><td>$d[nomor_hp]</td><td>$d[alamat]</td>";
            echo "<td><a href='pembeli.php?edit=$d[id]'>Edit</a> | <a href='pembeli.php?hapus=$d[id]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>
</html>
