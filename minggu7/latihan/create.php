<?php
if(isset($_POST['Submit'])) {
    include("koneksi.php");
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    mysqli_query($koneksi, "INSERT INTO posts(judul, konten) VALUES('$judul','$konten')");
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Tambah Post</title></head>
<body>
    <h1>Tambah Post</h1>
    <a href="index.php">Batal</a>
    <form action="create.php" method="POST">
        Judul<br><input type="text" name="judul" size="60"><br>
        Konten (pisahkan paragraf dengan Enter)<br><textarea name="konten" rows="10" cols="60"></textarea><br>
        <input type="submit" name="Submit">
    </form>
</body>
</html>
