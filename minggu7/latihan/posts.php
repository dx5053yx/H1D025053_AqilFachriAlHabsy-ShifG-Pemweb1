<?php
require_once __DIR__ . "/common.php";
$posts = $koneksi->query("SELECT id, judul, konten FROM posts ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
</head>
<body>
    <h1>Berita Terkini</h1>
    <nav>
        <a href="../index.php">Beranda Minggu 7</a>
    </nav>
    <p><a href="create.php?entity=posts">Tambah artikel</a></p>
    <?php while ($post = $posts->fetch_assoc()): ?>
        <article>
            <h2><?php echo escape_html($post["judul"]); ?></h2>
            <p><?php echo nl2br(escape_html($post["konten"])); ?></p>
            <a href="update.php?entity=posts&amp;id=<?php echo (int) $post["id"]; ?>">Ubah</a>
            <form action="delete.php" method="post" style="display:inline" onsubmit="return confirm('Hapus artikel ini?')">
                <input type="hidden" name="entity" value="posts">
                <input type="hidden" name="id" value="<?php echo (int) $post["id"]; ?>">
                <button type="submit">Hapus</button>
            </form>
        </article>
        <hr>
    <?php endwhile; ?>
</body>
</html>
