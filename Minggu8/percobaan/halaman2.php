<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Percobaan 1</title>
</head>
<body>
    <h1>Menerima Data session dari halaman 1</h1>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<h2>Username session di halaman 2: " . htmlspecialchars($_SESSION['username']) . "</h2>";
    } else {
        echo "<p>Session belum dibuat. Buka halaman 1 terlebih dahulu.</p>";
    }
    ?>
    <a href="halaman1.php">Kembali ke halaman 1</a>
</body>
</html>
