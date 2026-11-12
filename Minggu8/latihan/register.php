<?php
session_start();
require 'koneksi.php';
if (isset($_SESSION['username'])) { header('Location: index.php'); exit; }
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $konfirmasi = $_POST['confirm_password'] ?? '';

    if ($username === '' || $password === '') {
        $pesan = 'Username dan password wajib diisi.';
    } elseif ($password !== $konfirmasi) {
        $pesan = 'Konfirmasi password tidak sama.';
    } else {
        $cek = mysqli_prepare($koneksi, 'SELECT id FROM user WHERE username = ?');
        mysqli_stmt_bind_param($cek, 's', $username);
        mysqli_stmt_execute($cek);
        mysqli_stmt_store_result($cek);
        if (mysqli_stmt_num_rows($cek) > 0) {
            $pesan = 'Username sudah digunakan.';
        } else {
            $simpan = mysqli_prepare($koneksi, 'INSERT INTO user (username, password) VALUES (?, ?)');
            $hash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($simpan, 'ss', $username, $hash);
            mysqli_stmt_execute($simpan);
            $pesan = 'Registrasi berhasil. Silakan login.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Register</title></head>
<body>
    <h1>Registrasi User</h1>
    <p><?= htmlspecialchars($pesan) ?></p>
    <form method="post">
        Username: <input name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Konfirmasi password: <input type="password" name="confirm_password" required><br>
        <button name="register">Register</button>
    </form>
    <a href="login.php">Sudah punya akun? Login</a>
</body>
</html>
