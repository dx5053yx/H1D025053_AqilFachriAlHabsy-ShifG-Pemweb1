<?php
session_start();
if (!isset($_SESSION['username'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="10;url=logout.php">
    <title>Index Tugas</title>
</head>
<body>
    <h1>Selamat datang, <?= htmlspecialchars($_SESSION['username']) ?></h1>
    <p>Anda akan logout otomatis dalam 10 detik.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
