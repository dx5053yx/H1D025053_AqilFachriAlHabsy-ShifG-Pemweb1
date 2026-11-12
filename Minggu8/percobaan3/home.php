<?php
session_start();
if (!isset($_SESSION['nama'], $_SESSION['umur'], $_SESSION['email'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Percobaan 3</title>
</head>
<body>
    <?php echo "<h1>Halo, " . htmlspecialchars($_SESSION['nama']) . "</h1>"; ?>
    <h3>selamat datang di situs kami</h3>
    <?php
    echo "Umur: " . (int) $_SESSION['umur'] . " tahun <br>";
    echo "Alamat Email: " . htmlspecialchars($_SESSION['email']) . "<br>";
    ?>
</body>
</html>
