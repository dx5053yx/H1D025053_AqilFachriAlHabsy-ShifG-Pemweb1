<?php
session_start();
require 'koneksi.php';
if (isset($_SESSION['username'])) { header('Location: index.php'); exit; }
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $stmt = mysqli_prepare($koneksi, 'SELECT password FROM user WHERE username = ?');
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hash);
    if (mysqli_stmt_fetch($stmt) && password_verify($password, $hash)) {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    }
    $pesan = 'Username atau password salah.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
    <h1>Login User</h1>
    <p><?= htmlspecialchars($pesan) ?></p>
    <form method="post">
        Username: <input name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <button name="login">Login</button>
    </form>
    <a href="register.php">Buat akun baru</a>
</body>
</html>
