<?php
include("koneksi.php");
$read = mysqli_query($koneksi, "SELECT * FROM posts ORDER BY id");
?>
<!DOCTYPE html>
<html lang="en">
<head><title>News</title></head>
<body>
    <h1>Post News Ter-Update!</h1>
    <a href="create.php"><button>Tambah Post</button></a>
    <?php
    $no = 1;
    while($p = mysqli_fetch_array($read)) {
        echo "<h2>$no. $p[judul]</h2>";
        echo "<a href='update.php?id=$p[id]'>Edit</a> | <a href='delete.php?id=$p[id]'>Delete</a>";
        foreach(explode("\n", $p['konten']) as $paragraf) echo "<p>$paragraf</p>";
        $no++;
    }
    ?>
</body>
</html>
