<?php
include("koneksi.php");
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    mysqli_query($koneksi, "UPDATE posts SET judul='$judul', konten='$konten' WHERE id=$id");
    header("Location:index.php");
}
$id = $_GET['id'];
$p = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM posts WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Edit Post</title></head>
<body>
    <h1>Edit Post</h1>
    <a href="index.php">Batal</a>
    <form action="update.php" method="POST">
        Judul<br><input type="text" name="judul" size="60" value="<?php echo $p['judul']; ?>"><br>
        Konten (pisahkan paragraf dengan Enter)<br><textarea name="konten" rows="10" cols="60"><?php echo $p['konten']; ?></textarea><br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
